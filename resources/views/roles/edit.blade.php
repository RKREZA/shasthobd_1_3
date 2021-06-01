@extends('layouts.master')
@section('page_title')
    {{__('role.edit.title')}}
@endsection

@push('css')
<style type="text/css">
	#permission .form-group label{
		border: 1px solid #337f67;
	    display: block;
	    padding: 0px 10px 19px 10px;
	}
</style>
@endpush
@section('content')

			
	<div class="page-breadcrumb">
        {{ Breadcrumbs::render('roles.edit') }}
    </div>

    <div class="card">




    	<form method="post" action="{{ route('roles.update', $role->id) }}">
    		@csrf()
	    	<div class="card-header">
	    		<div class="row">
			    	<div class="col-6">
			    		<h2 class="card-title">
			    			<a href="{{ route('roles.index') }}"><i data-feather="arrow-left" class="feather-icon"></i></a>
					        {{__('role.edit.title')}}
					    </h2>
			    	</div>
			    	<div class="col-6">
			    		<button type="submit" class="btn btn-outline-success btn-rounded float-right"><i data-feather="save" class="feather-icon"></i> {{__('role.form.update-button')}}</button>
			    	</div>
			    </div>
	    	</div>
	    	<div class="card-body">

		    	
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<label for="name">{{__('role.form.name')}}:</label>

						<input type="text" name="name" id="name" class="form-control @error('name') form-control-error @enderror" required="required" value="{{$role->name}}">

						@error('name')
							<span class="text-danger">{{ $message }}</span>
						@enderror

					</div>

					<div class="form-group">
						<label for="code">{{__('role.form.code')}}:</label>

						<input type="text" name="code" id="code" class="form-control @error('code') form-control-error @enderror" disabled value="{{$role->code}}">

						@error('code')
							<span class="text-danger">{{ $message }}</span>
						@enderror

					</div>

				</div>
				
				<div class="col-xs-12 col-sm-12 col-md-12" id="permission">
					<div class="form-group">
						{{__('role.form.permission')}}:
						@error('permission')
							<br>
							<span class="text-danger">{{ $message }}</span>
						@enderror
						<br><br>
						@foreach($permission as $value)
							<label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
							{{ ucwords(str_replace('-', ' ', $value->name)) }}</label>
						@endforeach
					</div>
				</div>
				
			</div>
		</form>
    </div>
	

@endsection