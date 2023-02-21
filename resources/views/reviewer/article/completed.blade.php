@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<center>
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

                <div class="card-body" >
                    <h4 class="modal-title" id="myModalLabel">To be reviewed</h4>
                    <hr/>


<div class="table-responsive">
                    <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Title of Manuscript</th>
                                <th>Manuscript Type</th>
                                
                                <th>Status</th>
                                <th>Review</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $rows as $key => $row )
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
                                 <td>
                                    <button type="button"onclick="window.location.href='view/{{$row->id}}'" class="btn btn-success btn-sm">
                                        View
                                    </button>
                               </td>
                            </tr>
                            @endforeach
</tbody></table>
                    @endsection

                   