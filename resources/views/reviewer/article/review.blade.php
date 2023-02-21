
<?php
use App\Http\Controllers\reviewer\ArticleController;?>
@extends('admin.layouts.master')
@section('title', $title)
@section('content')
 
    <!-- Edit modal content -->
<div class="container-fluid" style="overflow-y: scroll; height:500px;">
    
    <!-- start page title -->
    <!-- Include page breadcrumb -->
    @include('admin.inc.breadcrumb')
    <!-- end page title --> 



<div class="card">
<div class="container">
  <div class="row">

    <div class="col">
<h4> WELCOME TO REVIEW MODE</h4>
        <p  style="font-size: 12px;">Click and drag your cursor to highlight text and click on the pen and paper icon to enter your comment. When finished, please click the Submit Review button to view the reviewer questionnaire where you will be prompted to answer a few questions regarding the article.
    </p>
     @foreach( $rows as $key => $row )

@php
$str = $row->description;
$cnt=0;
$prev_reviewer_id=0;
@endphp


                <div class="card-title"><h4>Title:{{$row->title}}</h4>
</div>
<div class="card-body" style="background-color: lightgrey; color: black;">
<p>
         @foreach( $review as $k => $r ) 
                  
@php


   
   $keyword = $r->correction_string;
   $com=$r->comment;
   $reviewer_id=$r->reviewer_id;


@endphp
<?php

$name= ArticleController::getnamebyuserid($r->reviewer_id);

//echo"--$reviewer_id== $prev_reviewer_id";
if(($reviewer_id!=$prev_reviewer_id )&& ($prev_reviewer_id!=0)){
    $cnt=$cnt+1;
    //echo $cnt;
}
//echo "--$cnt--$reviewer_id--$prev_reviewer_id\n";
//$str ={!!$row->description!!}

$str = preg_replace("/\b([a-z]*${keyword}[a-z]*)\b/i",'<b data-toggle="popover" title="Reviewed by:'.$name.'" data-content='.$com.' style="background-color:'.$colors[$r->color-1].';">$1</b>',$str);
 // prints 'Its <b>fun</b> to be <b>funny</b> and <b>unfunny</b>'
//echo $str;



?>


@php
$prev_reviewer_id=$r->reviewer_id;



@endphp
@endforeach
<?php
echo $str;
?>
                


@endforeach
</p></div>
<br>
<button onclick="getSelectedText();alert(txt);" class="btn btn-danger">ADD COMMENT</button><br><br>
    </div>

    <div class="col">
       
     <br> <br> <br>
<form class="needs-validation" novalidate action="{{ URL::route('reviewer.'.$url.'.review') }}" method="post" enctype="multipart/form-data">
                @csrf
   
     <input type="text" id="myTextarea" class="form-control" name="string" required>
<br>
<textarea class="form-control" rows="10" cols="70" name="comments" required>
    





</textarea>
<input type="hidden" class="form-control" name="reviewer_id" value="{{$user_id}}">
<input type="hidden" class="form-control" name="article_id" value="{{$id}}">

  <br> <br>
  Score:
  <select class="form-select" aria-label="Default select example" name="score" required>
  
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
   <option value="4">Four</option>
    <option value="5">Five</option>
</select>
                    <button type="submit" name="submit" class="btn btn-primary" value = "save">Submit to Publisher</button>
   </form>

    </div>
  </div>     
    </div>
</div>





</div>



    @endsection


   
   <script type="text/javascript"> 

 function getSelectedText() {
    var a;
    if (window.getSelection) {
        txt = window.getSelection();
    } else if (window.document.getSelection) {
        txt =window.document.getSelection();
    } else if (window.document.selection) {
        txt = window.document.selection.createRange().text;
    }
    a=txt;
    document.getElementById("myTextarea").value = a;
    return txt;  
}

function myFunction() {
  document.getElementById("myTextarea").value = "Fifth Avenue, New York City";
}
</script>
