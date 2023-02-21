    <!-- Edit modal content -->
    <div id="editModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <form class="needs-validation" novalidate action="{{ URL::route('publisher.'.$url.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
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
                    
                    @if($row->status != 10)
                      <div class="form-group">
                        <label for="status">Action</label>
                        <select class="wide" name="status" id="status" data-plugin="customselect">
                            <option value="">Select</option>
                            <option value="9" @if( $row->status == 9 ) selected @endif>Under Publisher</option>
                            <option value="10" @if( $row->status == 10 ) selected @endif>Approve</option>
                            <option value="11" @if( $row->status == 11 ) selected @endif>Reject</option>
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