@extends('layouts.master')
@section('page_title')
    {{__('permission.create.title')}}
@endsection
@section('content')

			
	<div class="page-breadcrumb">
        {{ Breadcrumbs::render('permissions.create') }}
    </div>

    <div class="card">

    	{!! Form::open(array('route' => 'permissions.store','method'=>'POST')) !!}

	    	<div class="card-header">
	    		<div class="row">
			    	<div class="col-6">
			    		<h2 class="card-title">
			    			<a href="{{ route('permissions.index') }}"><i data-feather="arrow-left" class="feather-icon"></i></a>
					        {{__('permission.create.title')}}
					    </h2>
			    	</div>
			    	<div class="col-6">
			    		<button type="submit" class="btn btn-outline-success btn-rounded float-right">
			    			<i data-feather="save" class="feather-icon"></i> 
			    			{{__('permission.form.save-button')}}
			    		</button>
			    	</div>
			    </div>
	    	</div>
	    	<div class="card-body">

		    	
				
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">

						<div class="form-group">
							<label for="name">{{__('permission.form.name')}}:</label>

							<input type="text" name="name" id="name" class="form-control @error('name') form-control-error @enderror" required="required" value="{{old('name')}}">

							@error('name')
								<span class="text-danger">{{ $message }}</span>
							@enderror

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