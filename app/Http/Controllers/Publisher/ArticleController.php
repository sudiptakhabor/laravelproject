<?php

namespace App\Http\Controllers\Publisher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
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
        $rows = Article::where('status', '7')->orwhere('status', '9')->orderBy('updated_at', 'desc')->get();
        $categories = ArticleCategory::where('status', '1')->get();
        
        $title = $this->title;
        $url = $this->url;
        $stat = 'Active';

        return view('publisher.'.$url.'.index', compact('rows', 'categories', 'title', 'url', 'stat'));
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
        
        
        return view('publisher.'.$url.'.create', compact('categories', 'title', 'url'));
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
            'start_date' => 'required|date|after_or_equal:today',
        ]);


        // editable_manuscript upload, fit and store inside public folder 
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

            // Move File inside public/uploads/ folder
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


        // Insert Data
        $data = new Article;
        $data->title = $request->title;
        $data->category_id = $request->category;
        $data->writer_id = Auth::user()->id;
        $data->description = $request->details;
        $data->image_path = $imageNameToStore;
        $data->file_path = $fileNameToStore;
        $data->video_id = $request->video_id;
        $data->upload_status = 1;
        $data->status = 9;
        $data->start_date = $request->start_date;
        $data->created_by = Auth::user()->id;
        
        if($request->submit == "save") {
            $data->status = 10;
        }
        
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
            'video_id' => 'nullable|max:100'
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
        $data->image_path = $imageNameToStore;
        $data->file_path = $fileNameToStore;
        $data->video_id = $request->video_id;
        $data->upload_status = 2;
        
        if($data->status == 10){
            $data->start_date = Carbon::now()->toDateTimeString();    
        }
        
        
        $data->updated_by = Auth::user()->id;
        $data->status = $request->status;
        
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
        $approvedList = Article::where('status', '10')->orderBy('updated_at', 'desc')->get();
        $pendingList = Article::where('status', '7')->orwhere('status', '9')->orderBy('updated_at', 'desc')->get();
        $rejectList = Article::where('status', '11')->orderBy('updated_at', 'desc')->get();


        $title = 'Article History';
        $url = 'history';

        $route_name = 'approve';

        $categories = ArticleCategory::where('status', '1')->get();


        return view('publisher.'.$url.'.index', compact('approvedList', 'pendingList', 'rejectList', 'categories','route_name', 'title', 'url', 'route_name'));

    }
    
    public function published()
    {
        $user_id = Auth::user()->id;
        //
        $rows = Article::where('status', '=', 10)->orderBy('updated_at', 'desc')->get();
        $published = Article::where('start_date', '!=', 'null')->orderBy('updated_at', 'desc')->get();
        $categories = ArticleCategory::where('status', '1')->get();
    
        $title = $this->title;
        $url = $this->url;
        $stat = 'Published';

        return view('publisher.'.$url.'.index', compact('rows', 'published', 'categories', 'title', 'url', 'stat'));
    }

}
