<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\ArticlesReviewDate;
use App\User;
use App\ArticleCategory;
use Carbon\Carbon;
use Session;
use Image;
use File;
use Auth;
use DB;

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
        $this->title = 'Article';
        $this->url = 'article';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approve()
    {
        //
        $user_id = Auth::user()->id;
        
        $rows = Article::where('status', '4')->orwhere('status', '7')->orwhere('status', '10')->orderBy('updated_at', 'desc')->get();
        $categories = ArticleCategory::where('status', '1')->get();
    

        $title = 'Approve Article';
        $url = $this->url;

        $route_name = 'approve';

        return view('admin.'.$url.'.index', compact('rows', 'categories', 'title', 'url', 'route_name'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        //
        
        $user_id = Auth::user()->id;
        
        $rows = Article::where('status', '1')->orwhere('status', '2')->orwhere('status', '3')->orwhere('status', '6')->orwhere('status', '9')->orderBy('updated_at', 'desc')->get();
		
		foreach($rows as $key => $value)
		{
			/* ---- START reviewer name */
			
			$reviewer_data = User::whereRaw('FIND_IN_SET(id, "'.$value->reviewer_id.'")')->get()->toArray();
			$reviewer_name = array_column($reviewer_data,'name');
			
			$rows[$key]->reviewer_name	=	implode(', ',$reviewer_name); 
		} 
		
        $categories = ArticleCategory::where('status', '1')->get(); 

        $title = 'Pending Article';
        $url = $this->url;

        $route_name = 'pending';

        return view('admin.'.$url.'.index', compact('rows', 'categories', 'title', 'url', 'route_name'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reject()
    {
        //
        
        $user_id = Auth::user()->id;
        
        $rows = Article::where('status', '5')->orwhere('status', '8')->orwhere('status', '11')->orderBy('updated_at', 'desc')->get();
        $categories = ArticleCategory::where('status', '1')->get();

        $title = 'Reject Article';
        $url = $this->url;

        $route_name = 'reject';

        return view('admin.'.$url.'.index', compact('rows', 'categories', 'title', 'url', 'route_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'image' => 'nullable|image',
            'file' => 'nullable|file',
            'video_id' => 'nullable|max:100',
            'start_date' => 'required|date|after_or_equal:today',
        ]);


        // file upload, fit and store inside public folder 
        if($request->hasFile('file')){
            //Upload New Image
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = base_path('uploads/'.$this->url.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            // Move File inside public/uploads/ folder
            $file = $request->file('file')->move($path, $fileNameToStore);
        }
        else{
            $fileNameToStore = NULL;
        }



        // image upload, fit and store inside public folder 
        if($request->hasFile('image')){
            //Upload New Image
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = base_path('uploads/'.$this->url.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here (640 width, 400 height)
            $thumbnailpath = $path.$imageNameToStore;
            $img = Image::make($request->file('image')->getRealPath())->fit(640, 400, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
        }
        else{
            $imageNameToStore = 'no_image.jpg';
        }


        // Insert Data
        $data = new Article;
        $data->title = $request->title;
        $data->category_id = $request->category;
        $data->writer_id = Auth::user()->id;
        $data->description = $request->details;
        $data->image_path = $imageNameToStore;
        $data->file_path = $fileNameToStore;
        $data->video_id = $request->video_id;
        $data->start_date = $request->start_date;
        $data->upload_status = 1;
        $data->status = 1;
        $data->created_by = Auth::user()->id;
        $data->save();


        Session::flash('success', $this->title.' Created Successfully!');

        return redirect()->route('article.approve');
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
            'image' => 'nullable|image',
            'file' => 'nullable|file',
            'video_id' => 'nullable|max:100',
            'start_date' => 'required|date',
        ]);


        // file upload, fit and store inside public folder 
        if($request->hasFile('file')){

            //Delete Old Image
            $old_file = Article::find($id);

            $file_path = base_path('uploads/'.$this->url.'/'.$old_file->file_path);
            if(File::isFile($file_path)){
                File::delete($file_path);
            }

            //Upload New Image
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = base_path('uploads/'.$this->url.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            // Move File inside public/uploads/ folder
            $file = $request->file('file')->move($path, $fileNameToStore);
        }
        else{

            $old_file = Article::find($id);

            $fileNameToStore = $old_file->file_path; 
        }



        // image upload, fit and store inside public folder 
        if($request->hasFile('image')){

            //Delete Old Image
            $old_file = Article::find($id);

            $file_path = base_path('uploads/'.$this->url.'/'.$old_file->image_path);
            if(File::isFile($file_path)){
                File::delete($file_path);
            }

            //Upload New Image
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = base_path('uploads/'.$this->url.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here (640 width, 400 height)
            $thumbnailpath = $path.$imageNameToStore;
            $img = Image::make($request->file('image')->getRealPath())->fit(640, 400, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
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
        $data->image_path = $imageNameToStore;
        $data->file_path = $fileNameToStore;
        $data->video_id = $request->video_id;
        $data->start_date = $request->start_date;
        $data->status = $request->status;
        $data->updated_by = Auth::user()->id;
        $data->save();
		
		/* ---- START update insert review date */ 
		 
		$record_checking = ArticlesReviewDate::where('article_id',$id)->orderBy('id', 'desc')->get()->toArray(); 
		
		if(count($record_checking) > 0 && $request->review_date != $record_checking[0]['review_last_date'])
		{
			$data_review_date 					= new ArticlesReviewDate;
			$data_review_date->article_id 		= $id;
			$data_review_date->review_last_date = $request->review_date; 
			$data_review_date->save();
		}else{
			$data_review_date 					= new ArticlesReviewDate;
			$data_review_date->article_id 		= $id;
			$data_review_date->review_last_date = $request->review_date; 
			$data_review_date->save();
		} 
		
		/* ---- END update insert review date */ 

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

        return redirect()->back();
    }
}
