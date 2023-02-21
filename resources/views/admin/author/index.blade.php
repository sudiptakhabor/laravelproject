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
            <a href="{{ URL::route($url.'.index') }}" class="btn btn-info">Refresh</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <!-- Include Flash Messages -->
                    @include('admin.inc.message')
                </div>

                <div class="card-body">
                  <h4 class="header-title">{{ $title }} List</h4>

                  <!-- Data Table Start -->
                  <div class="table-responsive">
                    <table id="basic-datatable" class="table table-striped table-hover table-dark nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $rows as $key => $row )
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>
                                    <form class="needs-validation" novalidate action="{{ URL::route('userrole.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <input type="hidden" name="usrid" value="{{$row->id}}">
                                        @foreach( $roles as $key => $val )
                                            @if(App\UserRole::where([['user_id', '=', $row->id], ['role_id', '=', $val->id]])->exists())
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" name="role[]" value="{{$val->id}}" id="user{{$row->id}}role{{$val->id}}" checked>
                                                  <label class="form-check-label" for="user{{$row->id}}role{{$val->id}}">
                                                    {{$val->name}}
                                                  </label>
                                                </div>
                                            @else 
                                            
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" name="role[]" value="{{$val->id}}" id="user{{$row->id}}role{{$val->id}}">
                                                  <label class="form-check-label" for="user{{$row->id}}role{{$val->id}}">
                                                    {{$val->name}}
                                                  </label>
                                                </div>
                                            
                                            @endif
                                        @endforeach
                                        <button type="submit" class="btn btn-sm btn-success">Assign</button>
                                    </form>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal-{{ $row->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <!-- Include Show modal -->
                                    @include('admin.'.$url.'.show')
                                    

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $row->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                           
                                    <!-- Include Delete modal -->
                                    @include('admin.inc.delete')
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

    
</div> <!-- container -->
<!-- End Content-->

@endsection