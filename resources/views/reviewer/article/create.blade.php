@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="container-fluid">
    
    <!-- start page title -->
    <!-- Include page breadcrumb -->
    @include('admin.inc.breadcrumb')
    <!-- end page title --> 

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <!-- Include Flash Messages -->
                    @include('admin.inc.message')
                </div>

                <div class="card-body">
                    <h4 class="modal-title" id="myModalLabel">Add {{ $title }}</h4>
                    <hr/>

                <form class="needs-validation" novalidate action="{{ URL::route('reviewer.'.$url.'.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                    <!-- Form Start -->
                    <div class="form-group">
                        <label for="title">Title of Manuscript</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Manuscript Title" required>

                        <div class="invalid-feedback">
                          Please Provide Manuscript Title.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category">Manuscript Type</label>
                        <select class="form-control" name="category" id="category" required>
                            <option value="">Select Manuscript Type</option>
                            @foreach( $categories as $category )
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>

                        <div class="invalid-feedback">
                          Please Select Manuscript Type.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="details">Manuscript Details</label>
                        <textarea class="form-control summernote" name="details" id="details" rows="8" required></textarea>

                        <div class="invalid-feedback">
                          Please Provide Manuscript Details.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="thumbnail">Thumbnail Image</label>
                        <input type="file" class="form-control" name="thumbnail" id="thumbnail" placeholder="Thumbnail Image">

                        <div class="invalid-feedback">
                          Please Provide Thumbnail Image.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="evidence_file">Evidence Files (Representative Pic with Caption, Media:- Images, Videos, pdf, word, excel etc.)</label>
                        <input type="file" class="form-control" name="evidence_file[]" id="evidence_file" multiple  placeholder="Evidence Files">

                        <div class="invalid-feedback">
                          Please Provide Evidence Files.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editable_manuscript">Upload Editable Manuscript</label>
                        <input type="file" class="form-control" name="editable_manuscript" id="editable_manuscript" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" placeholder="Editable Manuscript">

                        <div class="invalid-feedback">
                          Please Provide Editable Manuscript.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="video_id">Youtube Video ID</label>
                        <input type="text" class="form-control" name="video_id" id="video_id" placeholder="Video ID">

                        <div class="invalid-feedback">
                          Please Provide Youtube Video ID.
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="status">Evidence Quality</label>
                        <select class="wide" name="evidence_quality" id="evidence_quality" data-plugin="customselect">
                             @foreach($row as $r)
                            <option value="1" @if( $r->evidence_quality == 1 ) selected @endif>1</option>
                            <option value="2" @if( $r->evidence_quality == 2 ) selected @endif>2</option>
                            <option value="3" @if( $r->evidence_quality == 3 ) selected @endif>3</option>
                            <option value="4" @if( $r->evidence_quality == 4 ) selected @endif>4</option>
                            <option value="5" @if( $r->evidence_quality == 5 ) selected @endif>5</option>
                            <option value="6" @if( $r->evidence_quality == 6 ) selected @endif>6</option>
                            <option value="7" @if( $r->evidence_quality == 7 ) selected @endif>7</option>
                            <option value="8" @if( $r->evidence_quality == 8 ) selected @endif>8</option>
                            <option value="9" @if( $r->evidence_quality == 9 ) selected @endif>9</option>
                            <option value="10" @if( $r->evidence_quality == 10) selected @endif>10</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Evidence Completeness </label>
                        <select class="wide" name="evidence_complete" id="evidence_complete" data-plugin="customselect">
                             @foreach($row as $r)
                            <option value="1" @if( $r->evidence_complete == 1 ) selected @endif>1</option>
                            <option value="2" @if( $r->evidence_complete == 2 ) selected @endif>2</option>
                            <option value="3" @if( $r->evidence_complete == 3 ) selected @endif>3</option>
                            <option value="4" @if( $r->evidence_complete == 4 ) selected @endif>4</option>
                            <option value="5" @if( $r->evidence_complete == 5 ) selected @endif>5</option>
                            <option value="6" @if( $r->evidence_complete == 6 ) selected @endif>6</option>
                            <option value="7" @if( $r->evidence_complete == 7 ) selected @endif>7</option>
                            <option value="8" @if( $r->evidence_complete == 8 ) selected @endif>8</option>
                            <option value="9" @if( $r->evidence_complete == 9 ) selected @endif>9</option>
                            <option value="10" @if( $r->evidence_complete == 10) selected @endif>10</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Content Novelty</label>
                        <select class="wide" name="content_novelty" id="content_novelty" data-plugin="customselect">
                             @foreach($row as $r)

                            <option value="1" @if( $r->content_novelty == 1 ) selected @endif>1</option>
                            <option value="2" @if( $r->content_novelty == 2 ) selected @endif>2</option>
                            <option value="3" @if( $r->content_novelty == 3 ) selected @endif>3</option>
                            <option value="4" @if( $r->content_novelty == 4 ) selected @endif>4</option>
                            <option value="5" @if( $r->content_novelty == 5 ) selected @endif>5</option>
                            <option value="6" @if( $r->content_novelty == 6 ) selected @endif>6</option>
                            <option value="7" @if( $r->content_novelty == 7 ) selected @endif>7</option>
                            <option value="8" @if( $r->content_novelty == 8 ) selected @endif>8</option>
                            <option value="9" @if( $r->content_novelty == 9 ) selected @endif>9</option>
                            <option value="10" @if( $r->content_novelty == 10) selected @endif>10</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Article Message</label>
                        <select class="wide" name="article_msg" id="article_msg" data-plugin="customselect">
                             @foreach($row as $r)

                            <option value="1" @if( $r->article_msg == 1 ) selected @endif>1</option>
                            <option value="2" @if( $r->article_msg == 2 ) selected @endif>2</option>
                            <option value="3" @if( $r->article_msg == 3 ) selected @endif>3</option>
                            <option value="4" @if( $r->article_msg == 4 ) selected @endif>4</option>
                            <option value="5" @if( $r->article_msg == 5 ) selected @endif>5</option>
                            <option value="6" @if( $r->article_msg == 6 ) selected @endif>6</option>
                            <option value="7" @if( $r->article_msg == 7 ) selected @endif>7</option>
                            <option value="8" @if( $r->article_msg == 8 ) selected @endif>8</option>
                            <option value="9" @if( $r->article_msg == 9 ) selected @endif>9</option>
                            <option value="10" @if( $r->article_msg == 10) selected @endif>10</option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Statistics and Methodology </label>
                        <select class="wide" name="static_method" id="static_method" data-plugin="customselect">
                             @foreach($row as $r)
                            
                            <option value="1" @if( $r->static_method == 1 ) selected @endif>1</option>
                            <option value="2" @if( $r->static_method == 2 ) selected @endif>2</option>
                            <option value="3" @if( $r->static_method == 3 ) selected @endif>3</option>
                            <option value="4" @if( $r->static_method == 4 ) selected @endif>4</option>
                            <option value="5" @if( $r->static_method == 5 ) selected @endif>5</option>
                            <option value="6" @if( $r->static_method == 6 ) selected @endif>6</option>
                            <option value="7" @if( $r->static_method == 7 ) selected @endif>7</option>
                            <option value="8" @if( $r->static_method == 8 ) selected @endif>8</option>
                            <option value="9" @if( $r->static_method == 9 ) selected @endif>9</option>
                            <option value="10" @if( $r->static_method == 10) selected @endif>10</option>
                                 @endforeach
                        </select>
                    </div>

                    
                    <div class="form-group">
                        <label for="status">Comments</label>
                        <textarea class="form-control summernote" name="low_score_reason" id="low_score_reason" rs="4">{{ $r->low_score_reason }}</textarea>
                    </div>
                    <!-- Form End -->
                
                    <button type="submit" name="submit" class="btn btn-primary" value = "draft">Save as Draft</button>
                    <button type="submit" name="submit" class="btn btn-primary" value = "save">Submit to Publisher</button>
                    
                
              </form>
                  

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end r-->

    
</div> <!-- container -->
<!-- End Content-->

@endsection