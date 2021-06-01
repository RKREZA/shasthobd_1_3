@extends('layouts.master')
@section('page_title')
    {{__('permission.edit.title')}}
@endsection
@section('content')

			
	<div class="page-breadcrumb">
        {{ Breadcrumbs::render('permissions.edit') }}
    </div>

    <div class="card">


    	<form method="post" action="{{ route('permissions.update', $permissions->id) }}">
    		@csrf()
	    	<div class="card-header">
	    		<div class="row">
			    	<div class="col-6">
			    		<h2 class="card-title">
			    			<a href="{{ route('permissions.index') }}"><i data-feather="arrow-left" class="feather-icon"></i></a>
					        {{__('permission.edit.title')}}
					    </h2>
			    	</div>
			    	<div class="col-6">
			    		<button type="submit" class="btn btn-outline-success btn-rounded float-right"><i data-feather="save" class="feather-icon"></i> {{__('permission.form.update-button')}}</button>
			    	</div>
			    </div>
	    	</div>
	    	<div class="card-body">

		    	
				<div class="col-xs-12 col-sm-12 col-md-12">

					<div class="form-group">
						<label for="name">{{__('permission.form.name')}}:</label>

						<input type="text" name="name" id="name" class="form-control @error('name') form-control-error @enderror" required="required" value="{{$permissions->name}}">

						@error('name')
							<span class="text-danger">{{ $message }}</span>
						@enderror

					</div>

				</div>
				
			</div>
		</form>


    </div>
	

@endsection