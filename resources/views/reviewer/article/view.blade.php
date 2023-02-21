
<?php
use App\Http\Controllers\reviewer\ArticleController;?>
@extends('admin.layouts.master')
@section('title', $title)
@section('content')
 
    <!-- Edit modal content -->
<div class="container-fluid">
    
    <!-- start page title -->
    <!-- Include page breadcrumb -->
    @include('admin.inc.breadcrumb')
    <!-- end page title --> 



<div style="overflow-y: scroll; height:500px;">
<div class="container">
  

    <div class="col">
<h4>  REVIEWED MANUSCRIPT</h4>
        <p  style="font-size: 12px;">CLICK ON THE COLOR TO CHECK THE REVIEW
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
