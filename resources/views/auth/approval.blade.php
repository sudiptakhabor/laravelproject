@extends('admin.layouts.master')
@section('title', 'Verify')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">

                    <div class="text-center w-75 m-auto">
                        @foreach( $settings as $setting )
                        <a href="{{ URL('/') }}">
                            <span><img src="{{ asset('/uploads/setting/'.$setting->logo_path) }}" alt="" height="22"></span>
                        </a>
                        @endforeach
                        <p class="text-muted mb-4 mt-3">Waiting for Approval.</p>
                    </div>

                    {{ __('Your account is waiting for our administrator approval.') }}
                    {{ __('Please check back later.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
