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
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-newspaper"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Approve Manuscripts</h5>
                        <h3 class="mt-2">{{ $approve }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-edit"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Pending Manuscripts</h5>
                        <h3 class="mt-2">{{ $pending }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-comments"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total Comments</h5>
                        <h3 class="mt-2">{{ $comment->count() }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        @can('isAdmin')
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-ban"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Rejected Manuscripts</h5>
                        <h3 class="mt-2">{{ $reject }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        @endcan
        
        @can('isPublisher')
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-user-tie"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total Authors</h5>
                        <h3 class="mt-2">{{ $authors }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-ban"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Rejected Manuscripts</h5>
                        <h3 class="mt-2">{{ $reject }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        @endcan
        
        @can('isEditor')
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-user-tie"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total Authors</h5>
                        <h3 class="mt-2">{{ $authors }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
                <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-ban"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Rejected Manuscripts</h5>
                        <h3 class="mt-2">{{ $reject }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        @endcan

        @can('isReviewer')
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-user-tie"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total Authors</h5>
                        <h3 class="mt-2">{{ $authors }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-ban"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Rejected Manuscripts</h5>
                        <h3 class="mt-2">{{ $reject }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        @endcan

        @can('isAuthor')
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-question-circle"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Active Issues</h5>
                        <h3 class="mt-2">{{ $issue->count() }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
         <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-ban"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Rejected Manuscripts</h5>
                        <h3 class="mt-2">{{ $reject }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-file"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Draft Manuscripts</h5>
                        <h3 class="mt-2">{{ $draft }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-book"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Published Manuscripts</h5>
                        <h3 class="mt-2">{{ $publishedArticle }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        @endcan
    </div>
      
    <!-- end row -->
    
    @can('isAdmin')
    <div class="row">
        
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-user-tag"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total Authors</h5>
                        <h3 class="mt-2">{{ $authors }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-user-tie"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total Reviewers</h5>
                        <h3 class="mt-2">{{ $reviewers }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-user-tie"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total Editors</h5>
                        <h3 class="mt-2">{{ $editors }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        
        <div class="col-xl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body p-0">
                    <div class="p-3 pb-0">
                        <div class="float-right">
                            <span class="icon text-danger widget-icon"><i class="fas fa-user-tie"></i></span>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0">Total Publishers</h5>
                        <h3 class="mt-2">{{ $publishers }}</h3>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        

        
    </div>
    <!-- end row -->
    @endcan

    @can('isAdmin')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                  <h4 class="header-title">Pending Manuscript List</h4>

                  <!-- Data Table Start -->
                  <div class="table-responsive">
                    <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Manuscript Id</th>
                                <th>Title of Manuscript</th>
                                <th>Manuscript Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $rows as $key => $row )
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
                               
                            </tr>
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
    @endcan
    
    
    @can('isPublisher')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                  <h4 class="header-title">Pending Manuscript List</h4>

                  <!-- Data Table Start -->
                  <div class="table-responsive">
                    <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Manuscript Id</th>
                                <th>Title of Manuscript</th>
                                <th>Manuscript Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $rows as $key => $row )
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
                               
                            </tr>
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
    @endcan
    
    
    @can('isEditor')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                  <h4 class="header-title">Pending Manuscript List</h4>

                  <!-- Data Table Start -->
                  <div class="table-responsive">
                    <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Manuscript Id</th>
                                <th>Title of Manuscript</th>
                                <th>Manuscript Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $rows as $key => $row )
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
                               
                            </tr>
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
    @endcan



    @can('isReviewer')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                  <h4 class="header-title">Pending Manuscript List</h4>

                  <!-- Data Table Start -->
                  <div class="table-responsive">
                    <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Manuscript Id</th>
                                <th>Title of Manuscript</th>
                                <th>Manuscript Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $rows as $key => $row )
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
                               
                            </tr>
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
    @endcan



    @can('isAuthor')
    <!--<div class="row">-->
    <!--    <div class="col-12">-->

    <!--        <div class="card">-->
    <!--            <div class="card-body">-->
    <!--              <h4 class="header-title">Active Issue List</h4>-->
                  
    <!--              <div class="table-responsive">-->
    <!--                <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">-->
    <!--                    <thead>-->
    <!--                        <tr>-->
    <!--                            <th>Sr. No</th>-->
    <!--                            <th>Title of Manuscript</th>-->
    <!--                            <th>Manuscript Type</th>-->
    <!--                            <th>Status</th>-->
    <!--                        </tr>-->
    <!--                    </thead>-->
    <!--                    <tbody>-->
    <!--                     @foreach( $rows as $key => $row )-->
    <!--                        <tr>-->
    <!--                            <td>{{ $key + 1 }}</td>-->
    <!--                            <td>{{ $row->title }}</td>-->
    <!--                            <td>{{ $row->category->title }}</td>-->
    <!--                            <td>-->
    <!--                                @if( $row->status == 0 )-->
    <!--                                	<span class="badge badge-secondary badge-pill">Draft</span>-->
    <!--                                @elseif ( $row->status == 1 )-->
    <!--                                	<span class="badge badge-info badge-pill">New Submision</span>-->
    <!--                                @elseif ( $row->status == 2 )-->
    <!--                                	<span class="badge badge-info badge-pill">Resubmission</span>-->
    <!--                                @elseif ( $row->status == 3 )-->
    <!--                                	<span class="badge badge-light badge-pill">Under Editor</span>-->
    <!--                                @elseif ( $row->status == 4 )-->
    <!--                                	<span class="badge badge-success badge-pill">Editor Approved</span>-->
    <!--                                @elseif ( $row->status == 5 )-->
    <!--                                	<span class="badge badge-danger badge-pill">Editor Rejected</span>-->
    <!--                                @elseif ( $row->status == 6 )-->
    <!--                                	<span class="badge badge-primary badge-pill">Under Review</span>-->
    <!--                                @elseif ( $row->status == 7 )-->
    <!--                                	<span class="badge badge-success badge-pill">Reviwed</span>-->
    <!--                                @elseif ( $row->status == 8 )-->
    <!--                                	<span class="badge badge-danger badge-pill">Reviewer Rejected</span>-->
    <!--                                @elseif ( $row->status == 9 )-->
    <!--                                	<span class="badge badge-primary badge-pill">Under Publisher</span>-->
    <!--                                @elseif ( $row->status == 10 )-->
    <!--                                	<span class="badge badge-success badge-pill">Published</span>-->
    <!--                                @elseif ( $row->status == 11 )-->
    <!--                                	<span class="badge badge-danger badge-pill">Publisher Rejected</span>-->
    <!--                                @endif-->
    <!--                            </td>-->
                               
    <!--                        </tr>-->
    <!--                      @endforeach-->
    <!--                    </tbody>-->
    <!--                </table>-->
    <!--              </div>-->
                  

    <!--            </div> -->
    
    @endcan


</div> <!-- container -->
<!-- End Content-->

@endsection