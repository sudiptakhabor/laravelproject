    <!-- Show modal content -->
    <div id="showModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{ $title }} Details View</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Details View Start -->
                    <h4><span class="text-highlight">Title of Manuscript:</span> {{ $row->title }}</h4>

                    @if(is_file('uploads/'.$url.'/'.$row->image_path))
                    <img src="{{ asset('uploads/'.$url.'/'.$row->image_path) }}" class="img-fluid" alt="Article">
                    <br/>
                    @endif

                    @if(is_file('uploads/'.$url.'/'.$row->file_path))
                    <a href="{{ asset('uploads/'.$url.'/'.$row->file_path) }}" class="btn btn-success" download>Download Documents</a>
                    <br/>
                    @endif

                    @if(!empty($row->video_id))
                    <p><span class="text-highlight">Youtube Video:</span></p>
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $row->video_id }}?rel=0" allowfullscreen></iframe>
                    </div>
                    <br/>
                    @endif

                    <hr/>
                    <p><span class="text-highlight">Manuscript Type:</span> {{ $row->category->title }}</p>
                    <p><span class="text-highlight">Manuscript Details:</span> {!! $row->description !!}</p>
                    
                    <p><span class="text-highlight">Evidence Files:</span> 
                        @foreach($row->articlefiles as $file) 
                            @if(is_file('uploads/'.$url.'/'.$file->filename))
                            <p><a href="{{ asset('uploads/'.$url.'/'.$file->filename) }}">{{$file->filename}}</a></p>
                            @endif
                        @endforeach
                    </p>
                    <br/>

                    <hr/>
                 
                    <p><span class="text-highlight">Status:</span> 
                        @if( $row->status == 0 )
                        	<span class="badge badge-secondary badge-pill">Draft</span>
                        @elseif ( $row->status == 1 )
                        	<span class="badge badge-info badge-pill">New Submision</span>
                        @elseif ( $row->status == 2 )
                        	<span class="badge badge-info badge-pill">Resubmission</span>
                        @elseif ( $row->status == 3 )
                        	<span class="badge badge-light badge-pill">Under Editor</span>
                        @elseif ( $row->status == 4 )
                        	<span class="badge badge-success badge-pill">Editor Approved</span>
                        @elseif ( $row->status == 5 )
                        	<span class="badge badge-danger badge-pill">Editor Rejected</span>
                        @elseif ( $row->status == 6 )
                        	<span class="badge badge-primary badge-pill">Under Review</span>
                        @elseif ( $row->status == 7 )
                        	<span class="badge badge-success badge-pill">Reviwed</span>
                        @elseif ( $row->status == 8 )
                        	<span class="badge badge-danger badge-pill">Reviewer Rejected</span>
                        @elseif ( $row->status == 9 )
                        	<span class="badge badge-primary badge-pill">Under Publisher</span>
                        @elseif ( $row->status == 10 )
                        	<span class="badge badge-success badge-pill">Published</span>
                        @elseif ( $row->status == 11 )
                        	<span class="badge badge-danger badge-pill">Publisher Rejected</span>
                        @endif
                    </p>
                    <!-- Details View End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->