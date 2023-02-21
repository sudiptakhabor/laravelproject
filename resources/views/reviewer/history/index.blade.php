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
                 <!-- <h4 class="header-title">{{ $title }} List</h4>---->

                  <!-- Data Table Start -->
                  <div class="table-responsive">
                      <h4> Approve Articles </h4>
                    <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Category</th>
                                
                                <th>Review Status</th>
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
                                    @if( $row->review_status == 2 )
                                    <span class="badge badge-success badge-pill">Approve</span>
                                    @elseif( $row->review_status == 1 )
                                    <span class="badge badge-primary badge-pill">Pending</span>
                                    @else
                                    <span class="badge badge-danger badge-pill">Reject</span>
                                    @endif
                                </td>
                                <td>
                                    @if( $row->status == 1 )
                                    <span class="badge badge-success badge-pill">Active</span>
                                    @else
                                    <span class="badge badge-danger badge-pill">Inactive</span>
                                    @endif
                                </td>
                                
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
                  <!-- Data Table End -->

                </div> <!-- end card body-->
            
        
    <div class="card-body">   
       <div class="table-responsive">
                      <h4> Pending  Articles </h4>
                    <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Category</th>
                                
                                <th>Review Status</th>
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
                                    @if( $row->review_status == 2 )
                                    <span class="badge badge-success badge-pill">Approve</span>
                                    @elseif( $row->review_status == 1 )
                                    <span class="badge badge-primary badge-pill">Pending</span>
                                    @else
                                    <span class="badge badge-danger badge-pill">Reject</span>
                                    @endif
                                </td>
                                <td>
                                    @if( $row->status == 1 )
                                    <span class="badge badge-success badge-pill">Active</span>
                                    @else
                                    <span class="badge badge-danger badge-pill">Inactive</span>
                                    @endif
                                </td>
                                
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
                  <!-- Data Table End -->

                </div> <!-- end card body-->
            
    <div class="card-body">   
        <div class="table-responsive">
                      <h4> <strong>Rejected Articles<strong> </h4>
                    <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Category</th>
                                
                                <th>Review Status</th>
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
                                    @if( $row->review_status == 2 )
                                    <span class="badge badge-success badge-pill">Approve</span>
                                    @elseif( $row->review_status == 1 )
                                    <span class="badge badge-primary badge-pill">Pending</span>
                                    @else
                                    <span class="badge badge-danger badge-pill">Reject</span>
                                    @endif
                                </td>
                                <td>
                                    @if( $row->status == 1 )
                                    <span class="badge badge-success badge-pill">Active</span>
                                    @else
                                    <span class="badge badge-danger badge-pill">Inactive</span>
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