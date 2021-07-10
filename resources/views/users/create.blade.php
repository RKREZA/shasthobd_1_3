@extends('layouts.master')
@section('page_title')
    {{__('user.create.title')}}
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
        {{ Breadcrumbs::render('users.create') }}
    </div>
    

    <div class="card">

    	{{-- @if($errors->any())
		    {{ implode('', $errors->all(__('<div>:message</div>'))) }}
		@endif --}}

    	<form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data" id="user_create_form">
    		@csrf()
	    	<div class="card-header">
	    		<div class="row">
			    	<div class="col-6">
			    		<h2 class="card-title">
					        <a href="{{ route('users.index') }}"><i data-feather="arrow-left" class="feather-icon"></i></a> {{__('user.create.title')}}
					    </h2>
			    	</div>
			    	<div class="col-6">
			    		<button type="submit" class="btn btn-outline-success btn-rounded float-right"><i data-feather="save" class="feather-icon"></i> {{__('user.form.save-button')}}</button>
			    	</div>
			    </div>
	    	</div>

	    	<div class="card-body">

							
	    		<div class="row">
	    			<div class="col-md-4 col-sm-12" style="margin: auto;">

						<div class="input-group mb-5">
			            	
			            		<img src="" alt="..." id="output" class="img-thumbnail rounded mx-auto d-block mb-3"  onerror="this.src='{{ asset('assets/images/user.png') }}';">

			                <input type="text" hidden id="image1" class="form-control" name="image" aria-label="Image" aria-describedby="button-image">
			                <div class="input-group-append" style="width: 100%;">
			                    <button class="btn btn-secondary btn-lg btn-block" type="button" id="button-image">
			                    <i data-feather="image" class="feather-icon"></i>
			                    Select User's Image
			                 	</button>
			                </div>
			            </div>



					</div>


					@push('scripts')

                        <script>
                          var loadFileImageFront = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                          };
                        </script>

                    @endpush
	    		</div>



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
										<label for="name" class="required">{{__('user.form.name')}}:</label>

										<input type="text" name="name" id="name" class="form-control @error('name') form-control-error @enderror" required="required" value="{{old('name')}}">

										@error('name')
											<span class="text-danger">{{ $message }}</span>
										@enderror

									</div>


									<div class="form-group">
										<label for="mobile" class="required">{{__("user.form.mobile")}}:</label>

										<input type="number" name="mobile" id="mobile" class="form-control @error('mobile') form-control-error @enderror" required="required" value="{{old('mobile')}}">

										@error('mobile')
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



				    <div class="card">
				      <div class="card-header">
				        <a class="card-link" data-toggle="collapse" href="#authentication">
				          Authentication
				        </a>
				      </div>
				      <div id="authentication" class="collapse show" data-parent="#accordion">
						<div class="card-body">



							<div class="row">
								
									


								<div class="col-md-8">

									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="form-group">
											<label for="email" class="required">{{__("user.form.email")}}:</label>

											<input type="email" name="email" id="email" class="form-control @error('email') form-control-error @enderror" required="required" value="{{old('email')}}">

											@error('email')
												<span class="text-danger">{{ $message }}</span>
											@enderror
											
										</div>
									</div>

									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="form-group">
											<label for="password" class="required">{{__("user.form.password")}}:</label>

											<input type="password" name="password" id="password" class="form-control @error('password') form-control-error @enderror" required="required">

											@error('password')
												<span class="text-danger">{{ $message }}</span>
											@enderror
											
										</div>
									</div>

									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="form-group">
											<label for="password-confirm" class="required">{{__("user.form.password-confirm")}}:</label>

											<input type="password" name="confirm-password" id="password-confirm" class="form-control @error('password-confirm') form-control-error @enderror" required="required">

											@error('confirm-password')
												<span class="text-danger">{{ $message }}</span>
											@enderror
											
										</div>
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


				    <div class="card">
				      <div class="card-header">
				        <a class="collapsed card-link" data-toggle="collapse" href="#role">
				          Role & Permission
				        </a>
				      </div>
				      <div id="role" class="collapse show" data-parent="#accordion">
				        <div class="card-body">
				          	<div class="row">
				          		<div class="col-md-8">
									<div class="form-group">

										<label for="roles" class="required">{{__("user.form.role")}}:</label>
										{!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple', 'required' => 'required')) !!}

										@error('roles')
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
			</div>
			
		</form>

    </div>
	

@endsection


@push('scripts')
	<script>
		$("#user_create_form").validate();
	</script>


	<script>
	  document.addEventListener("DOMContentLoaded", function() {

	    document.getElementById('button-image').addEventListener('click', (event) => {
	      event.preventDefault();

	      inputId = 'image1';

	      window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
	    });

	  });

	  // input
	  let inputId = '';
	  let output = 'output';

	  // set file link
	  function fmSetLink($url) {
	    document.getElementById(inputId).value = $url;
	    document.getElementById(output).src = $url;
	  }
	</script>



@endpush