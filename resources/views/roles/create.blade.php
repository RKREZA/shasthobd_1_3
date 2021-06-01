@extends('layouts.master')
@section('page_title')
    {{__('role.create.title')}}
@endsection
@section('content')

			
	<div class="page-breadcrumb">
        {{ Breadcrumbs::render('roles.create') }}
    </div>

    <div class="card">

    	{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}

	    	<div class="card-header">
	    		<div class="row">
			    	<div class="col-6">
			    		<h2 class="card-title">
			    			<a href="{{ route('roles.index') }}"><i data-feather="arrow-left" class="feather-icon"></i></a>
					        {{__('role.create.title')}}
					    </h2>
			    	</div>
			    	<div class="col-6">
			    		<button type="submit" class="btn btn-outline-success btn-rounded float-right">
			    			<i data-feather="save" class="feather-icon"></i> 
			    			{{__('role.form.save-button')}}
			    		</button>
			    	</div>
			    </div>
	    	</div>
	    	<div class="card-body">

		    	
				
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<label for="name">{{__('role.form.name')}}:</label>

							<input type="text" name="name" id="name" class="form-control @error('name') form-control-error @enderror" required="required" value="{{old('name')}}">

							@error('name')
								<span class="text-danger">{{ $message }}</span>
							@enderror

						</div>
						<div class="form-group">
							<label for="code">{{__('role.form.code')}}:</label>

							<input type="text" name="code" id="code" class="form-control @error('code') form-control-error @enderror" required="required" value="{{old('code')}}">

							@error('code')
								<span class="text-danger">{{ $message }}</span>
							@enderror

						</div>

					</div>

					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<label for="name">{{__('role.form.permission')}}:</label>
							@error('permission')
								<br>
								<span class="text-danger">{{ $message }}</span>
							@enderror
							<br><br>
							@foreach($permission as $value)
								<label style="margin-left: 20px;">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
								{{ $value->name }}</label>
							<br>
							@endforeach
						</div>
					</div>

					{{-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div> --}}
				</div>

				
			</div>
		{!! Form::close() !!}
		
    </div>
	

@endsection