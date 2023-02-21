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
                    <h5>IMPORTANT Information ! Please read before moving forward! (Some text will be here)</h5>
                    <hr/>
                    

                <form class="needs-validation" novalidate action="{{ URL::route('author.'.$url.'.store') }}" method="post" enctype="multipart/form-data">
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
                    <!-- Form End -->
                
                    <button type="submit" name="submit" class="btn btn-primary" value = "draft">Save as Draft</button>
                    <button type="submit" name="submit" class="btn btn-primary" value = "save">Submit to Editor</button>
                    
                
              </form>
                  

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    
</div> <!-- container -->
<!-- End Content-->
    

@endsection