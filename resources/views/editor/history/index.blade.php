@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="container-fluid">
    
    <!-- start page title -->
    <!-- Include page breadcrumb -->
    @include('admin.inc.breadcrumb')
    <!-- end page title --> 


   
    <div class="card-body">
        
        <div class="table-responsive">
            <h4> Approved Manuscripts </h4>
                 <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Title of Manuscript</th>
                            <th>Manuscript Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach( $approvedList as $key => $row )
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->category->title }}</td>
                                    <td>
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
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            <!-- Data Table End -->    
    </div> <!-- end card body-->
</div> <!--end container -->

<div class="container-fluid">    
    <div class="card-body">   
       <div class="table-responsive">
                      <h4> Pending  Manuscripts </h4>
                    <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Title of Manuscript</th>
                                <th>Manuscript Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        
                    <tbody>
                          @foreach( $pendingList as $key => $row )
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->category->title }}</td>
                                <td>
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
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
              </div>
                  <!-- Data Table End -->

        </div> <!-- end card body-->
    </div>
    
  <div class="container-fluid">          
    <div class="card-body">   
        <div class="table-responsive">
                      <h4> <strong>Rejected Manuscripts<strong> </h4>
                    <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Title of Manuscript</th>
                                <th>Manuscript Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $rejectList as $key => $row )
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->category->title }}</td>
                                <td>
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
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
                  <!-- Data Table End -->

                </div> <!-- end card body-->
            </div> <!-- end card -->
            


</div> <!-- container -->
<!-- End Content-->

@endsection