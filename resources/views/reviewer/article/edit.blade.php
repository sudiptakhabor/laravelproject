<style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
    }
    
    .rating > input{ display:none;}
    
    .rating > label {
        position: relative;
        width: 1em;
        font-size: 3vw;
        color: #792a36;
        cursor: pointer;
    }
    .rating > label::before{ 
        content: "\2605";
        position: absolute;
        opacity: 0;
    }
    .rating > label:hover:before,
    .rating > label:hover ~ label:before {
        opacity: 1 !important;
    }
    
    .rating > input:checked ~ label:before{
        opacity:1;
    }
    
    .rating:hover > input:checked ~ label:before{ opacity: 0.4; }

</style>
    <!-- Edit modal content -->
    <div id="editModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ URL::route('reviewer.'.$url.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit {{ $title }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <div class="form-group">
                        <label for="title">Title of Manuscript</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $row->title }}" placeholder="Manuscript Title" required>

                        <div class="invalid-feedback">
                          Please Provide Manuscript Title.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category">Select Manuscript Type</label>
                        <select class="form-control" name="category" id="category" required>
                            <option value="">Select Manuscript</option>
                            @foreach( $categories as $category )
                            <option value="{{ $category->id }}" @if( $category->id == $row->category_id ) selected @endif>{{ $category->title }}</option>
                            @endforeach
                        </select>

                        <div class="invalid-feedback">
                          Please Select Manuscript Type.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="details">Manuscript Details</label>
                        <textarea class="form-control summernote" name="details" id="details" rows="8" required>{{ $row->description }}</textarea>

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
                        <input type="file" class="form-control" name="editable_manuscript" id="editable_manuscript" accept="application/msword" placeholder="Editable Manuscript">
                        
                        <div class="invalid-feedback">
                          Please Provide Editable Manuscript.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="video_id">Youtube Video ID</label>
                        <input type="text" class="form-control" name="video_id" id="video_id" value="{{ $row->video_id }}" placeholder="Video ID">

                        <div class="invalid-feedback">
                          Please Provide Youtube Video ID.
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Evidence Quality</label>
                        
                        <div class="rating">
                          <input type="radio" name="evidence_quality" value="10" id="eq10" {{ $row->evidence_quality == '10' ? 'checked' : '' }}><label for="eq10">☆</label>
                          <input type="radio" name="evidence_quality" value="9" id="eq9" {{ $row->evidence_quality == '9' ? 'checked' : '' }}><label for="eq9">☆</label>
                          <input type="radio" name="evidence_quality" value="8" id="eq8" {{ $row->evidence_quality == '8' ? 'checked' : '' }}><label for="eq8">☆</label>
                          <input type="radio" name="evidence_quality" value="7" id="eq7" {{ $row->evidence_quality == '7' ? 'checked' : '' }}><label for="eq7">☆</label>
                          <input type="radio" name="evidence_quality" value="6" id="eq6" {{ $row->evidence_quality == '6' ? 'checked' : '' }}><label for="eq6">☆</label>
                          <input type="radio" name="evidence_quality" value="5" id="eq5" {{ $row->evidence_quality == '5' ? 'checked' : '' }}><label for="eq5">☆</label>
                          <input type="radio" name="evidence_quality" value="4" id="eq4" {{ $row->evidence_quality == '4' ? 'checked' : '' }}><label for="eq4">☆</label>
                          <input type="radio" name="evidence_quality" value="3" id="eq3" {{ $row->evidence_quality == '3' ? 'checked' : '' }}><label for="eq3">☆</label>
                          <input type="radio" name="evidence_quality" value="2" id="eq2" {{ $row->evidence_quality == '2' ? 'checked' : '' }}><label for="eq2">☆</label>
                          <input type="radio" name="evidence_quality" value="1" id="eq1" {{ $row->evidence_quality == '1' ? 'checked' : '' }}><label for="eq1">☆</label>
                        </div>
                        
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Evidence Completeness </label>
                        <div class="rating">
                          <input type="radio" name="evidence_complete" value="10" id="ec10" {{ $row->evidence_complete == '10' ? 'checked' : '' }}><label for="ec10">☆</label>
                          <input type="radio" name="evidence_complete" value="9" id="ec9" {{ $row->evidence_complete == '9' ? 'checked' : '' }}><label for="ec9">☆</label>
                          <input type="radio" name="evidence_complete" value="8" id="ec8" {{ $row->evidence_complete == '8' ? 'checked' : '' }}><label for="ec8">☆</label>
                          <input type="radio" name="evidence_complete" value="7" id="ec7" {{ $row->evidence_complete == '7' ? 'checked' : '' }}><label for="ec7">☆</label>
                          <input type="radio" name="evidence_complete" value="6" id="ec6" {{ $row->evidence_complete == '6' ? 'checked' : '' }}><label for="ec6">☆</label>
                          <input type="radio" name="evidence_complete" value="5" id="ec5" {{ $row->evidence_complete == '5' ? 'checked' : '' }}><label for="ec5">☆</label>
                          <input type="radio" name="evidence_complete" value="4" id="ec4" {{ $row->evidence_complete == '4' ? 'checked' : '' }}><label for="ec4">☆</label>
                          <input type="radio" name="evidence_complete" value="3" id="ec3" {{ $row->evidence_complete == '3' ? 'checked' : '' }}><label for="ec3">☆</label>
                          <input type="radio" name="evidence_complete" value="2" id="ec2" {{ $row->evidence_complete == '2' ? 'checked' : '' }}><label for="ec2">☆</label>
                          <input type="radio" name="evidence_complete" value="1" id="ec1" {{ $row->evidence_complete == '1' ? 'checked' : '' }}><label for="ec1">☆</label>
                        </div>
                        
                      
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Content Novelty</label>
                        <div class="rating">
                          <input type="radio" name="content_novelty" value="10" id="cn10" {{ $row->content_novelty == '10' ? 'checked' : '' }}><label for="cn10">☆</label>
                          <input type="radio" name="content_novelty" value="9" id="cn9" {{ $row->content_novelty == '9' ? 'checked' : '' }}><label for="cn9">☆</label>
                          <input type="radio" name="content_novelty" value="8" id="cn8" {{ $row->content_novelty == '8' ? 'checked' : '' }}><label for="cn8">☆</label>
                          <input type="radio" name="content_novelty" value="7" id="cn7" {{ $row->content_novelty == '7' ? 'checked' : '' }}><label for="cn7">☆</label>
                          <input type="radio" name="content_novelty" value="6" id="cn6" {{ $row->content_novelty == '6' ? 'checked' : '' }}><label for="cn6">☆</label>
                          <input type="radio" name="content_novelty" value="5" id="cn5" {{ $row->content_novelty == '5' ? 'checked' : '' }}><label for="cn5">☆</label>
                          <input type="radio" name="content_novelty" value="4" id="cn4" {{ $row->content_novelty == '4' ? 'checked' : '' }}><label for="cn4">☆</label>
                          <input type="radio" name="content_novelty" value="3" id="cn3" {{ $row->content_novelty == '3' ? 'checked' : '' }}><label for="cn3">☆</label>
                          <input type="radio" name="content_novelty" value="2" id="cn2" {{ $row->content_novelty == '2' ? 'checked' : '' }}><label for="cn2">☆</label>
                          <input type="radio" name="content_novelty" value="1" id="cn1" {{ $row->content_novelty == '1' ? 'checked' : '' }}><label for="cn1">☆</label>
                        </div>
                       
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Article Message</label>
                        <div class="rating">
                          <input type="radio" name="article_msg" value="10" id="am10"  {{ $row->article_msg == '10' ? 'checked' : '' }}><label for="am10">☆</label>
                          <input type="radio" name="article_msg" value="9" id="am9" {{ $row->article_msg == '9' ? 'checked' : '' }}><label for="am9">☆</label>
                          <input type="radio" name="article_msg" value="8" id="am8" {{ $row->article_msg == '8' ? 'checked' : '' }}><label for="am8">☆</label>
                          <input type="radio" name="article_msg" value="7" id="am7" {{ $row->article_msg == '7' ? 'checked' : '' }}><label for="am7">☆</label>
                          <input type="radio" name="article_msg" value="6" id="am6" {{ $row->article_msg == '6' ? 'checked' : '' }}><label for="am6">☆</label>
                          <input type="radio" name="article_msg" value="5" id="am5" {{ $row->article_msg == '5' ? 'checked' : '' }}><label for="am5">☆</label>
                          <input type="radio" name="article_msg" value="4" id="am4" {{ $row->article_msg == '4' ? 'checked' : '' }}><label for="am4">☆</label>
                          <input type="radio" name="article_msg" value="3" id="am3" {{ $row->article_msg == '3' ? 'checked' : '' }}><label for="am3">☆</label>
                          <input type="radio" name="article_msg" value="2" id="am2" {{ $row->article_msg == '2' ? 'checked' : '' }}><label for="am2">☆</label>
                          <input type="radio" name="article_msg" value="1" id="am1" {{ $row->article_msg == '1' ? 'checked' : '' }}><label for="am1">☆</label>
                        </div>
                        
                      
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Statistics and Methodology </label>
                        <div class="rating">
                          <input type="radio" name="static_method" value="10" id="sam10" {{ $row->static_method == '10' ? 'checked' : '' }}><label for="sam10">☆</label>
                          <input type="radio" name="static_method" value="9" id="sam9" {{ $row->static_method == '9' ? 'checked' : '' }}><label for="sam9">☆</label>
                          <input type="radio" name="static_method" value="8" id="sam8" {{ $row->static_method == '8' ? 'checked' : '' }}><label for="sam8">☆</label>
                          <input type="radio" name="static_method" value="7" id="sam7" {{ $row->static_method == '7' ? 'checked' : '' }}><label for="sam7">☆</label>
                          <input type="radio" name="static_method" value="6" id="sam6" {{ $row->static_method == '6' ? 'checked' : '' }}><label for="sam6">☆</label>
                          <input type="radio" name="static_method" value="5" id="sam5" {{ $row->static_method == '5' ? 'checked' : '' }}><label for="sam5">☆</label>
                          <input type="radio" name="static_method" value="4" id="sam4" {{ $row->static_method == '4' ? 'checked' : '' }}><label for="sam4">☆</label>
                          <input type="radio" name="static_method" value="3" id="sam3" {{ $row->static_method == '3' ? 'checked' : '' }}><label for="sam3">☆</label>
                          <input type="radio" name="static_method" value="2" id="sam2" {{ $row->static_method == '2' ? 'checked' : '' }}><label for="sam2">☆</label>
                          <input type="radio" name="static_method" value="1" id="sam1" {{ $row->static_method == '1' ? 'checked' : '' }}><label for="sam1">☆</label>
                        </div>
                        
                      
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Comments</label>
                        <textarea class="form-control" name="low_score_reason" id="low_score_reason" rows="4">{{ $row->low_score_reason }}</textarea>
                    </div>
                    
                    @if($row->status != 9)
                    <div class="form-group">
                        <label for="status">Action</label>
                        <select class="wide" name="status" id="status" data-plugin="customselect">
                            <option value="">Select</option>
                            <option value="6" @if( $row->status == 6 ) selected @endif>Under Reviewer</option>
                            <option value="7" @if( $row->status == 7 ) selected @endif>Approve</option>
                            <option value="8" @if( $row->status == 8 ) selected @endif>Send Back to Author</option>
                        </select>
                    </div>
                    @endif
                    
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->