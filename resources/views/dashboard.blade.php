@extends('layouts.master')

@section('page_title')
    {{__('dashboard.title')}}
@endsection

@push('css')
    <style>
        .card-group .card-body{
            margin-top: 0;
            padding: 15px;
        }

        .navbar-nav .nav-link .select2-container--default .select2-selection--single{
          background: #fff;
          padding: 6px 6px 5px 10px;
          height: auto;
          border-radius: 20px;
          border: 0;
          color: #b8c3d5;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow{
          top: 6px;
          right: 8px;
        }
    </style>
@endpush

@section('content')
    <div class="page-breadcrumb">
        {{ Breadcrumbs::render('dashboard') }}
    </div>    


<div class="container">

    
</div>



@endsection




@push('css')
	
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/c3.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/chartist.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-jvectormap-2.0.2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/chartist.min.css') }}"/> --}}
    <style type="text/css">
    	.card{
    		background-color: #fff;
    	}
    </style>

@endpush

@push('scripts')

@endpush