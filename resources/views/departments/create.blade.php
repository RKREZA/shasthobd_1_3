@extends('layouts.master')
@section('page_title')
    {{__('department.create.title')}}
@endsection

@push('css')
	<style>
		#output{
			height: 300px;
			width: 300px;
		}
		#accordion .card-link{
			color: #fff !important;
			display: block;
			padding: .75rem 25px;
		}

		#accordion .card-header{
			background: #337f67;
			padding: 0;
		}

		#accordion .card-body{
			border: 1px solid #337f67;
			margin-top: 0;
		}

	</style>
@endpush


@section('content')

			
	<div class="page-breadcrumb">
        {{ Breadcrumbs::render('departments.create') }}
    </div>

    <div class="card">

    	<form method="post" action="{{ route('departments.store') }}">
    		@csrf()
	    	<div class="card-header">
	    		<div class="row">
			    	<div class="col-6">
			    		<h2 class="card-title">
					        <a href="{{ route('departments.index') }}"><i data-feather="arrow-left" class="feather-icon"></i></a> {{__('department.create.title')}}
					    </h2>
			    	</div>
			    	<div class="col-6">
			    		<button type="submit" class="btn btn-outline-success btn-rounded float-right"><i data-feather="save" class="feather-icon"></i> {{__('department.form.save-button')}}</button>
			    	</div>
			    </div>
	    	</div>

	    	<div class="card-body">
			


				<div id="accordion">

				    <div class="card">
				      <div class="card-header">
				        <a class="collapsed card-link" data-toggle="collapse" href="#personal_information">
				        Personal Information
				      </a>
				      </div>
				      <div id="personal_information" class="collapse show" data-parent="#accordion">
				        <div class="card-body">

				          	<div class="row">
								<div class="col-md-8">		
									
									<div class="form-group">
										<label for="name" class="required">{{__('department.form.name')}}:</label>

										<input type="text" name="name" id="name" class="form-control @error('name') form-control-error @enderror" required="required">

										@error('name')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>		
                                    
                                    <div class="form-group">
										<label for="name" class="required">{{__('department.form.code')}}:</label>

										<input type="text" name="code" id="code" class="form-control @error('name') form-control-error @enderror" required="required" >

										@error('code')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
                     
                                    <div class="form-group">
										<label for="description" class="required">{{__("doctor.form.description")}}:</label>

                                        <textarea cols="30" rows="10" name="description" class="form-control @error('description') form-control-error @enderror" id="description"></textarea>
										@error('description')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>     
                                    
								</div>


								<div class="col-md-4">
									<div class="card bg-secondary mb-3 instruction">
										<div class="card-header">
											<i data-feather="help-circle" class="feather-icon"></i> Instructions
										</div>
										<div class="card-body">
											<ul>
												<li>Lorem</li>
												<li>Lorem</li>
												<li>Lorem</li>
												<li>Lorem</li>
												<li>Lorem</li>
											</ul>
										</div>
									</div>
								</div>
								

							</div>
				        </div>
				      </div>
				    </div>

				   
				 </div>
			</div>
			
		</form>

    </div>
@endsection

