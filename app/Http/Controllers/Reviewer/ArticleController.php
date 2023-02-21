<?php

namespace App\Http\Controllers\Reviewer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Review_comment;
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
		
		/* ---- START custom query */
		
		/* $qry 	=	"SELECT * FROM articles WHERE FIND_IN_SET(".$user_id.", reviewer_id) AND (status = 4 OR status = 6 OR status = 7 OR status = 8 OR status = 9) ORDER BY updated_at DESC";
		 
		$rows	=	DB::select($qry); */
		 
		/* ---- END custom query */
		
		$rows 	= 	Article::whereRaw('FIND_IN_SET('.$user_id.', reviewer_id)')
					->where(function($query) {
						$query->where('status', 4)
							  ->orwhere('status', 6)
							  ->orwhere('status', 7)
							  ->orwhere('status', 8)
							  ->orwhere('status', 9);
					})->orderBy('updated_at', 'desc')
					->get();  
					
		/* $rows = Article::->where('status', 4)->orwhere('status', 6)->orwhere('status', 7)->orwhere('status', 8)->orwhere('status', 9)->orderBy('updated_at', 'desc')->get();    */
		
        $categories = ArticleCategory::where('status', '1')->get();
        

        $title = $this->title;
        $url = $this->url;
         //return "$rows";
        return view('reviewer.'.$url.'.index', compact('rows', 'categories', 'title', 'url'));
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
        $rows = Article::where('status', '2')->orderBy('updated_at', 'desc')->get();
        $categories = ArticleCategory::where('status', '1')->get();
        
        $approve = Article::where('status', '2')->count();
        $pending = Article::where('status', '1')->count();
        $reject = Article::where('status', '0')->count();

        $title = 'Approve Article';
        $url = $this->url;

        $route_name = 'approve';

//return $route_name;
        //return $pending;
        return view('reviewer.'.$url.'.index', compact('rows', 'categories', 'title', 'url', 'route_name', 'approve', 'pending', 'reject'));

        

    }
public function view($id){
$user_id = Auth::user()->id;
      
        //

        $rows = Article::where('id', $id)->get();
        $categories = ArticleCategory::where('status', '1')->get();
        $review=Review_comment::where('article_id',$id)->get();



        $title = $this->title;
        $url = $this->url;
        $stat = 'Active';

        $colors=['red','blue','orange','white','violet'];
$reviewer_count = Review_comment::distinct('reviewer_id')->pluck('reviewer_id')->count();



       //return $reviewer_count;
        return view('reviewer.'.$url.'.view', compact('rows', 'categories', 'title', 'url', 'stat','id','user_id','colors','reviewer_count','review'));



}
    public function completed(){

  $user_id = Auth::user()->id;
        $rows = Article::where('status', '7')->orderBy('updated_at', 'desc')->get();
        $categories = ArticleCategory::where('status', '1')->get();
        
        $approve = Article::where('status', '2')->count();
        $pending = Article::where('status', '1')->count();
        $reject = Article::where('status', '0')->count();

        $title = 'Approve Article';
        $url = $this->url;

        $route_name = 'approve';

//return $route_name;
        //return $pending;
        return view('reviewer.'.$url.'.completed', compact('rows', 'categories', 'title', 'url', 'route_name', 'approve', 'pending', 'reject'));



    }
    public function approve3()
    {
        //
        $user_id = Auth::user()->id;
        //$rows = Article::whereRaw('FIND_IN_SET('.$user_id.', reviewer_id)')->where('status', '4')->orwhere('status', '6')->orderBy('updated_at', 'desc')->get();
        
        $rows   =   Article::whereRaw('FIND_IN_SET('.$user_id.', reviewer_id)')
                    ->where(function($query) {
                        $query->where('status', 4)
                              ->orwhere('status', 6);
                            
                    })->orderBy('updated_at', 'desc')
                    ->get(); 
        $categories = ArticleCategory::where('status', '1')->get();
        
        $approve = Article::where('status', '2')->count();
        $pending = Article::where('status', '1')->count();
        $reject = Article::where('status', '0')->count();

        $title = 'Approve Article';
        $url = $this->url;

        $route_name = 'approve';


        //return $pending;
        return view('reviewer.'.$url.'.menu', compact('rows', 'categories', 'title', 'url', 'route_name', 'approve', 'pending', 'reject'));

        

    }
    public static function getnamebyuserid($reviewer_id){

        $reviewer_name=DB::table('users')
            ->where('id',$reviewer_id)
            ->pluck('name');

            return $reviewer_name[0];
    }
    public function approve2($id)
    {
        //
        $user_id = Auth::user()->id;
      
        //

        $rows = Article::where('id', $id)->get();
        $categories = ArticleCategory::where('status', '1')->get();
        $review=Review_comment::where('article_id',$id)->get();



        $title = $this->title;
        $url = $this->url;
        $stat = 'Active';

        $colors=['red','blue','orange','white','violet'];
$reviewer_count = Review_comment::distinct('reviewer_id')->pluck('reviewer_id')->count();



       //return $reviewer_count;
        return view('reviewer.'.$url.'.review', compact('rows', 'categories', 'title', 'url', 'stat','id','user_id','colors','reviewer_count','review'));

        

    }
     public function store_review(Request $request)
    {

        $user_id = Auth::user()->id;
        //$rows = Article::whereRaw('FIND_IN_SET('.$user_id.', reviewer_id)')->where('status', '4')->orwhere('status', '6')->orderBy('updated_at', 'desc')->get();
        
        $rows   =   Article::whereRaw('FIND_IN_SET('.$user_id.', reviewer_id)')
                    ->where(function($query) {
                        $query->where('status', 4)
                              ->orwhere('status', 6);
                            
                    })->orderBy('updated_at', 'desc')
                    ->get(); 
        $categories = ArticleCategory::where('status', '1')->get();
        
        $approve = Article::where('status', '2')->count();
        $pending = Article::where('status', '1')->count();
        $reject = Article::where('status', '0')->count();

        $title = 'Approve Article';
        $url = $this->url;

        $route_name = 'approve';

       $string=$request->comments;
        $comments=$request->comments;
$article_id= $request->article_id;
$reviewer_id=$request->reviewer_id;
$score=$request->score;
$reviewer_count = Review_comment::distinct('reviewer_id')->where('article_id',$article_id)->pluck('reviewer_id')->count();
$reviewer_color = Review_comment::where('reviewer_id',$reviewer_id)->where('article_id',$article_id)->pluck('color');
try{
                $review = new Review_comment;
                $review->correction_string=$request->string;
        $review->comment=$request->comments;
$review->article_id= $request->article_id;
$review->reviewer_id=$request->reviewer_id;
$review->score=$request->score;
$t=count($reviewer_color);
if($t>0){

 $review->color=$reviewer_color[0];   
}
else{
$review->color=$reviewer_count+1;
}
echo $t;
if($reviewer_count==4){
   //Article::where('id', $article_id)
     //  ->update([
       //    'status' => 7
        //]);
   }
                $review->save();


                  return view('reviewer.'.$url.'.menu', compact('rows', 'categories', 'title', 'url', 'route_name', 'approve', 'pending', 'reject'));

            }
            catch(Exception $e){
                return $e;
            } 

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
        $rows = Article::where('status', '1')->orderBy('updated_at', 'desc')->get();
        $categories = ArticleCategory::where('status', '1')->get();
        
        $approve = Article::where('status', '2')->count();
        $pending = Article::where('status', '1')->count();
        $reject = Article::where('status', '0')->count();

        $title = 'Pending Article';
        $url = $this->url;

        $route_name = 'pending';

        return view('reviewer.'.$url.'.index', compact('rows', 'categories', 'title', 'url', 'route_name', 'approve', 'pending', 'reject'));
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
        $rows = Article::where('status', '0')->orderBy('updated_at', 'desc')->get();
        $categories = ArticleCategory::where('status', '1')->get();
        
        
        $approve = Article::where('status', '2')->count();
        $pending = Article::where('status', '1')->count();
        $reject = Article::where('status', '0')->count();

        $title = 'Reject Article';
        $url = $this->url;

        $route_name = 'reject';

        return view('reviewer.'.$url.'.index', compact('rows', 'categories', 'title', 'url', 'route_name', 'approve', 'pending', 'reject'));
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
      $row  = DB::table('articles')
->select('evidence_complete','evidence_quality','content_novelty','article_msg','static_method','upload_status','low_score_reason')
->get();
        $categories = ArticleCategory::where('status', '1')->get();
        
      
        return view('reviewer.'.$url.'.create', compact('categories', 'title', 'url','row'));
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


        // Insert Data
        $data = new Article;
        $data->title = $request->title;
        $data->category_id = $request->category;
        $data->writer_id = Auth::user()->id;
        $data->description = $request->details;
        $data->image_path = $imageNameToStore;
        $data->file_path = $fileNameToStore;
        $data->video_id = $request->video_id;
        
        $data->evidence_quality = $request->evidence_quality;
        $data->evidence_complete = $request->evidence_complete;
        $data->content_novelty = $request->content_novelty;
        $data->article_msg = $request->article_msg;
        $data->static_method = $request->static_method;
        $data->low_score_reason = $request->low_score_reason;
        
        $data->upload_status = 1;
        $data->status = 7;
        $data->created_by = Auth::user()->id;
        
        if($request->submit == "save") {
            $data->status = 9;
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
        
        $data->evidence_quality = $request->evidence_quality;
        $data->evidence_complete = $request->evidence_complete;
        $data->content_novelty = $request->content_novelty;
        $data->article_msg = $request->article_msg;
        $data->static_method = $request->static_method;
        $data->low_score_reason = $request->low_score_reason;
        
        $data->status = $request->status;
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

return "hi";
        //Session::flash('success', $this->title.' Updated Successfully!');

        //return redirect()->back();
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
    
    public function history() 
    {
        $user_id = Auth::user()->id;
        $approvedList = Article::where('status', '2')->orderBy('updated_at', 'desc')->get();
        $pendingList = Article::where('status', '1')->orderBy('updated_at', 'desc')->get();
        $rejectList = Article::where('status', '0')->orderBy('updated_at', 'desc')->get();
        
        $approve = Article::where('status', '2')->count();
        $pending = Article::where('status', '1')->count();
        $reject = Article::where('status', '0')->count();
        
        $title = 'Article History';
        $url = 'history';
        
        $route_name = 'approve';
        
        $categories = ArticleCategory::where('status', '1')->get();
        
        
        return view('reviewer.'.$url.'.index', compact('approvedList', 'pendingList', 'rejectList', 'categories','route_name', 'title', 'url', 'route_name', 'approve', 'pending', 'reject'));
        
    }
    
    public function published()
    {
        $user_id = Auth::user()->id;
        //
        $rows = Article::where([['writer_id', $user_id], ['status', '=', 10]])->orderBy('updated_at', 'desc')->get();
        $published = Article::where('start_date', '!=', 'null')->where('articles.writer_id', $user_id)->orderBy('updated_at', 'desc')->get();
        $categories = ArticleCategory::where('status', '1')->get();
    

        $title = $this->title;
        $url = $this->url;
        $stat = 'Published';

        return view('reviewer.'.$url.'.index', compact('rows', 'published', 'categories', 'title', 'url', 'stat'));
    }
}
