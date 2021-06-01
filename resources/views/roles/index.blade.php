@extends('layouts.master')
@section('page_title')
    {{__('role.index.title')}}
@endsection
@section('content')

			
	<div class="page-breadcrumb">
        {{ Breadcrumbs::render('roles.index') }}
    </div>
    


    <div class="card">

    	<div class="card-header">
    		<div class="row">
		    	<div class="col-md-6 col-sm-12">
		    		<h2 class="card-title">
				        <i data-feather="user-check" class="feather-icon"></i>
				        {{__('role.index.title')}}
				    </h2>
		    	</div>
		    	<div class="col-md-6 col-sm-12">
		    		
		    		@can('role-create')
		    			<a href="{{ route('roles.create') }}" class="btn btn-outline-primary btn-rounded float-right"><i data-feather="plus" class="feather-icon"></i> {{__('role.form.add-button')}}</a>
		    		@endcan
		    	</div>
		    </div>
    	</div>
	    <div class="card-body">


			<table class="table table-report -mt-2" id="role_table">
				<thead>
					<tr>
						<th class="">{{__('role.form.id')}}</th>
						<th class="">{{__('role.form.name')}}</th>
						<th class="">{{__('role.form.code')}}</th>

						@if(Gate::check('role-edit') || Gate::check('role-delete'))
							<th class="">{{__('role.form.action')}}</th>
						@endif 
					</tr>
				</thead>

				<tbody>

					@foreach($roles as $role)
						<tr>
							<td>{{$role->id}}</td>
							<td>{{$role->name}}</td>
							<td><span class="badge badge-success badge-pill">{{$role->code}}</span></td>
							<td>




							@if(Gate::check('role-edit'))
								<a href="{{route('roles.edit', $role->id)}}" class="flex items-center text-success">
                                    <i data-feather="edit" class="feather-icon"></i>
                                        {{__('role.form.edit-button')}}
                                </a> 


								&nbsp;
							@endif 

							@if( Gate::check('role-delete'))
								<span class="flex justify-center items-center">
	                                <button class="btn btn-default btn-flat btn-sm text-danger remove-role flex items-center text-danger" data-id="{{ $role->id }}" data-action="/roles/destroy">
										<i data-feather="delete" class="feather-icon"></i>
		                                {{__('role.form.delete-button')}}
									</button>
	                            </span>
							@endif 
								

	                            


								
							</td>
						</tr>
					@endforeach
					
				</tbody>
				
			</table>


			<script>
				$(document).ready( function () {
				    $('#role_table').DataTable();
				} );
		    </script>
	    </div>
    </div>
	

@endsection




@push('scripts')
	<script type="text/javascript">
        $("body").on("click",".remove-role",function(){
            var current_object = $(this);
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this data!",
                type: "error",
                showCancelButton: true,
                dangerMode: true,
                cancelButtonClass: '#DD6B55',
                confirmButtonColor: '#dc3545',
                confirmButtonText: 'Delete!',
            },function (result) {
                if (result) {
                    var action = current_object.attr('data-action');
                    var token = jQuery('meta[name="csrf-token"]').attr('content');
                    var id = current_object.attr('data-id');

                    $('body').html("<form class='form-inline remove-form' method='POST' action='"+action+"'></form>");
                    $('body').find('.remove-form').append('<input name="_method" type="hidden" value="post">');
                    $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
                    $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
                    $('body').find('.remove-form').submit();
                }
            });
        });
	</script>
@endpush