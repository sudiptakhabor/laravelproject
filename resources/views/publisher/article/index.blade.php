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
                  <h4 class="header-title">{{$stat}} {{ $title }} List</h4>

                  <!-- Data Table Start -->
                  <div class="table-responsive">
                    <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">
                        <thead>
                            <tr>
                                @if($stat == 'Active')
                                    <th>Manuscript Id</th>
                                    <th>Title of Manuscript</th>
                                    <th>Manuscript Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                @else
                                    <th>Manuscript Id</th>
                                    <th>Votes</th>
                                    <th>Reviewed By</th>
                                    <th>Review</th>
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $rows as $key => $row )
                            @if($stat == 'Active')
                            <tr>
                                <td>{{ $row->id }}</td>
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
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal-{{ $row->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <!-- Include Show modal -->
                                    @include('publisher.'.$url.'.show')
                                    
                                    @if( $row->status == 7 || $row->status == 9)

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal-{{ $row->id }}">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <!-- Include Edit modal -->
                                    @include('publisher.'.$url.'.edit')
                                    
                                    @endif

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $row->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <!-- Include Delete modal -->
                                    @include('admin.inc.delete')
                                </td>
                                
                            </tr>
                            @else
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>1</td>
                                    <td>{{ App\User::getUserNameByID($row->reviewer_id) }}</td>
                                    
                                    <td>Test</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ URL('/article/' . $row->id) }}" target="_blank">View Full Article</a>
    
                                    </td>
                                    
                                </tr>
                            @endif
                          @endforeach
                        </tbody>
                    </table>
                  </div>
                  <!-- Data Table End -->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    
</div> <!-- container -->
<!-- End Content-->

@endsection