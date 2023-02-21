<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\ArticlesReviewDate;
use App\ArticleCategory;
use Carbon\Carbon;
use Session;
use Image;
use File;
use Auth;
use DB;
use App\User;
use App\ArticleFile;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Page Data
        $this->title = 'Manuscript';
        $this->url = 'article';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        //
        $rows = Article::where('status', 1)->orwhere('status', 3)->orwhere('status', 4)->orwhere('status', 5)->orwhere('status', 6)->orderBy('updated_at', 'desc')->get();
        $categories = ArticleCategory::where('status', '1')->get();
        

        $title = $this->title;
        $url = $this->url;
        $stat = 'Active';

        return view('editor.'.$url.'.index', compact('rows', 'categories', 'title', 'url', 'stat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;
        $url = $this->url;
        $user_id = Auth::user()->id;
        
        $categories = ArticleCategory::where('status', '1')->get();
        
        
        return view('editor.'.$url.'.create', compact('categories', 'title', 'url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:250',
            'category' => 'required',
            'details' => 'required',
            'thumbnail' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'evidence_file' => 'nullable',
            'editable_manuscript' => 'nullable|mimes:doc,docx',
            'video_id' => 'nullable|max:100',
        ]);


        // file upload, fit and store inside public folder 
        if($request->hasFile('editable_manuscript')){
            //Upload New Image
            $filenameWithExt = $request->file('editable_manuscript')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('editable_manuscript')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = base_path('uploads/'.$this->url.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            // Move editable_manuscript inside public/uploads/ folder
            $file = $request->file('editable_manuscript')->move($path, $fileNameToStore);
        }
        else{
            $fileNameToStore = NULL;
        }



        // thumbnail upload, fit and store inside public folder 
        if($request->hasFile('thumbnail')){
            //Upload New Image
            $filenameWithExt = $request->file('thumbnail')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $imageNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = base_path('uploads/'.$this->url.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit thumbnail here (640 width, 400 height)
            $thumbnailpath = $path.$imageNameToStore;
            $img = Image::make($request->file('thumbnail')->getRealPath())
                    ->fit(640, 400, function ($constraint) { $constraint->upsize(); })
                    ->text(config('app.name'), 120, 50, function($font) { 
                            $font->file(base_path('frontend/fonts/OpenSans-BoldItalic.ttf'));
                            $font->size(16);  
                            $font->color('#a2cdd2');  
                            $font->align('center');  
                            $font->valign('bottom');  
                            $font->angle(0);  
                        })
                    ->save($thumbnailpath);
        }
        else{
            $imageNameToStore = 'no_image.jpg';
        }
		/* ---- START getting all reviewers */
		
		$reviewers_list = 	User::where('user_type', 'R')->get()->toArray(); 
		$reviewers_id 	= 	array_column($reviewers_list, 'id');
		shuffle($reviewers_id);
		
		$assigned_reviewers 	=	'';
		
		$i = 0;
		
		foreach($reviewers_id as $r_id)
		{
			if($i >= 5)
			{
				break;
			}
			$assigned_reviewers .=	$r_id.",";
			
			$i++;
		} 
		$assigned_reviewers =	rtrim($assigned_reviewers,",");
		
		/* ---- END getting all reviewers */

        // Insert Data
        $data = new Article;
        $data->title = $request->title;
        $data->category_id = $request->category;
        $data->writer_id = Auth::user()->id;
        $data->description = $request->details;
        
        $data->abstracts = $request->abstracts;
        $data->keywords = $request->keywords;
        $data->coauther = $request->coauther;
        
        $data->image_path = $imageNameToStore;
        $data->file_path = $fileNameToStore;
        $data->video_id = $request->video_id;
        $data->upload_status = 1;
		$data->reviewer_id = $assigned_reviewers;
        $data->status = 3;
        $data->created_by = Auth::user()->id; 
		
        if($request->submit == "save") 
		{
            $data->status = 6;
        }
        
        $data->save();
		
		/* ----- START insert review date */
		
		$data_review_date 					= new ArticlesReviewDate;
		$data_review_date->article_id 		= $data->id;
		$data_review_date->review_last_date = date('Y-m-d', strtotime(date('Y-m-d').'+7 day')); 
		$data_review_date->save();
		
		/* ----- END insert review date */
        
        // evidence_file upload, fit and store inside public folder 
        if($request->hasFile('evidence_file')){
            
            $path = base_path('uploads/'.$this->url.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            
            $files = $request->file('evidence_file');
            
            foreach($files as $file) {
                // Upload Orginal Image           
                $filenameWithExt =$file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
                $extension = $file->getClientOriginalExtension();
                $fileToStore = $filename.'_'.time().'.'.$extension;
                
                // Move File inside public/uploads/ folder
                $file = $file->move($path, $fileToStore);
                
                $articleFile = new ArticleFile;
                $articleFile->user_id = Auth::user()->id;
                $articleFile->article_id = $data->id;
                $articleFile->filename = $fileToStore;
                $articleFile->save();
            }
 
        }
        else{
            $fileToStore = NULL;
        }


        Session::flash('success', $this->title.' Created Successfully!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:250',
            'category' => 'required',
            'details' => 'required',
            'thumbnail' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'evidence_file' => 'nullable',
            'editable_manuscript' => 'nullable|mimes:doc,docx',
            'video_id' => 'nullable|max:100',
        ]);


        $data = Article::find($id);
        
        // editable_manuscript upload, fit and store inside public folder 
        if($request->hasFile('editable_manuscript')){

            //Delete Old Image
            $old_file = Article::find($id);

            $file_path = base_path('uploads/'.$this->url.'/'.$old_file->file_path);
            if(File::isFile($file_path)){
                File::delete($file_path);
            }

            //Upload New Image
            $filenameWithExt = $request->file('editable_manuscript')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('editable_manuscript')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = base_path('uploads/'.$this->url.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            // Move editable_manuscript inside public/uploads/ folder
            $file = $request->file('editable_manuscript')->move($path, $fileNameToStore);
        }
        else{

            $old_file = Article::find($id);

            $fileNameToStore = $old_file->file_path; 
        }



        // thumbnail upload, fit and store inside public folder 
        if($request->hasFile('thumbnail')){

            //Delete Old Image
            $old_file = Article::find($id);

            $file_path = base_path('uploads/'.$this->url.'/'.$old_file->image_path);
            if(File::isFile($file_path)){
                File::delete($file_path);
            }

            //Upload New Image
            $filenameWithExt = $request->file('thumbnail')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $imageNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = base_path('uploads/'.$this->url.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit thumbnail here (640 width, 400 height)
            $thumbnailpath = $path.$imageNameToStore;
            $img = Image::make($request->file('thumbnail')->getRealPath())
                    ->fit(640, 400, function ($constraint) { $constraint->upsize(); })
                    ->text(config('app.name'), 120, 50, function($font) { 
                            $font->file(base_path('frontend/fonts/OpenSans-BoldItalic.ttf'));
                            $font->size(16);  
                            $font->color('#a2cdd2');  
                            $font->align('center');  
                            $font->valign('bottom');  
                            $font->angle(0);  
                        })
                    ->save($thumbnailpath);
        }
        else{

            $old_file = Article::find($id);

            $imageNameToStore = $old_file->image_path; 
        }


        // Update Data
        $data = Article::find($id);
        $data->title = $request->title;
        $data->category_id = $request->category;
        $data->description = $request->details;
        $data->abstracts = $request->abstracts;
        $data->keywords = $request->keywords;
        $data->coauther = $request->coauther;
        $data->image_path = $imageNameToStore;
        $data->file_path = $fileNameToStore;
        $data->video_id = $request->video_id;
        $data->upload_status = 2;
        $data->updated_by = Auth::user()->id;
        $data->status = $request->status;

        $reviewers_list =   User::where('user_type', 'R')->get()->toArray(); 
        $reviewers_id   =   array_column($reviewers_list, 'id');
        shuffle($reviewers_id);
        
        $assigned_reviewers     =   '';
        
        $i = 0;
        
        foreach($reviewers_id as $r_id)
        {
            if($i >= 5)
            {
                break;
            }
            $assigned_reviewers .=  $r_id.",";
            
            $i++;
        } 
        $assigned_reviewers =   rtrim($assigned_reviewers,",");
        
        $data->reviewer_id=$assigned_reviewers;
        $data->save();
        
        // evidence_file upload, fit and store inside public folder 
        if($request->hasFile('evidence_file')){
            
            $path = base_path('uploads/'.$this->url.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            
            $files = $request->file('evidence_file');
            
            foreach($files as $file) {
                // Upload Orginal Image           
                $filenameWithExt =$file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
                $extension = $file->getClientOriginalExtension();
                $fileToStore = $filename.'_'.time().'.'.$extension;
                
                // Move File inside public/uploads/ folder
                $file = $file->move($path, $fileToStore);
                
                $articleFile = new ArticleFile;
                $articleFile->user_id = Auth::user()->id;
                $articleFile->article_id = $data->id;
                $articleFile->filename = $fileToStore;
                $articleFile->save();
                

            }
 
        }
        else{
            $fileToStore = NULL;
        }

            
        Session::flash('success', $this->title.' Updated Successfully!');

    return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete Data
        $data = Article::find($id);

        if( $data->writer_id == Auth::user()->id ){
            
            $file_path = base_path('uploads/'.$this->url.'/'.$data->file_path);
            if(File::isFile($file_path)){
                File::delete($file_path);
            }

            $image_path = base_path('uploads/'.$this->url.'/'.$data->image_path);
            if(File::isFile($image_path)){
                File::delete($image_path);
            }

            $data->delete();

            Session::flash('success', $this->title.' Deleted Successfully!');

        }
        else{
            Session::flash('error', 'You are not permitted delete this!');
        }

        return redirect()->back();
    }
    
    public function history()
    {
        $user_id = Auth::user()->id;
        $approvedList = Article::where('status', '4')->orderBy('updated_at', 'desc')->get();
        $pendingList = Article::where('status', '1')->orwhere('status', 3)->orderBy('updated_at', 'desc')->get();
        $rejectList = Article::where('status', '5')->orderBy('updated_at', 'desc')->get();

        $approve = Article::where('status', '4')->count();
        $pending = Article::where('status', '1')->orwhere('status', 3)->count();
        $reject = Article::where('status', '5')->count();

        $title = 'Article History';
        $url = 'history';

        $route_name = 'approve';

        $categories = ArticleCategory::where('status', '1')->get();


        return view('editor.'.$url.'.index', compact('approvedList', 'pendingList', 'rejectList', 'categories','route_name', 'title', 'url', 'route_name', 'approve', 'pending', 'reject'));

    }
    
    public function published()
    {
        $user_id = Auth::user()->id;
        
        $rows = Article::where([['status', '=', 10]])->orderBy('updated_at', 'desc')->get();
        
        $categories = ArticleCategory::where('status', '1')->get();
    

        $title = $this->title;
        $url = $this->url;
        $stat = 'Published';

        return view('editor.'.$url.'.index', compact('rows', 'categories', 'title', 'url', 'stat'));
    }

}
