@extends('layouts.master')
@section('page_title')
    {{__('user.index.title')}}
@endsection
@section('content')

			
	<div class="page-breadcrumb">
        {{ Breadcrumbs::render('users.index') }}
    </div>
    


    <div class="card">

    	<div class="card-header">
    		<div class="row">
		    	<div class="col-md-6 col-sm-12">
		    		<h2 class="card-title">
				        <i data-feather="users" class="feather-icon"></i> {{__('user.index.title')}}
				    </h2>
		    	</div>
		    	<div class="col-md-6 col-sm-12">
		    		
		    		@can('user-create')
		    			<a href="{{ route('users.create') }}" class="btn btn-outline-primary btn-rounded float-right"><i data-feather="plus" class="feather-icon"></i> {{__('user.form.add-button')}}</a>
		    		@endcan
		    	</div>
		    </div>
    	</div>
	    <div class="card-body">

			<table class="table table-report -mt-2" id="table" style="font-size: 13px;">
				<thead>
					<tr>
						<th class="">{{__('#')}}</th>
						<th class="">{{__('user.form.image')}}</th>
						<th class="">{{__('user.form.name')}}</th>
						<th class="">{{__('user.form.email')}}</th>
						<th class="">{{__('user.form.mobile')}}</th>
						<th class="">{{__('user.form.role')}}</th>
						{{-- <th class="">{{__('user.form.user-since')}}</th> --}}
						{{-- <th class="">{{__('user.form.last-update')}}</th> --}}

						@if(Gate::check('user-edit') || Gate::check('user-delete'))
							<th class="">{{__('user.form.action')}}</th>
						@endif 
					</tr>
				</thead>

				<tbody>
					
				</tbody>
				
			</table>


			<script>
				$(function() {


					$('#table').DataTable({
						processing	: true,
						responsive 	: false,
						serverSide	: true,
						order:       [[0, 'desc' ]],
						ajax 		: '{{ route('users.index') }}',
						columns			: [
								{ data: 'DT_RowIndex', name: 'DT_RowIndex' },
						        { data: 'image', name: 'image' },
						        { data: 'name', name: 'name' },
						        { data: 'email', name: 'email' },
						        { data: 'mobile', name: 'mobile' },
						        { data: 'role', name: 'role' },						        

								@if(Gate::check('user-edit') || Gate::check('user-delete'))
									{ data: 'action', name: 'action', orderable: false, searchable: false}
								@endif 
						    ],

						"drawCallback": function( settings ) {
					        feather.replace();
					    }
					});
				});
		    </script>
	    </div>
    </div>
	

@endsection




@push('scripts')
	<script type="text/javascript">
        $("body").on("click",".remove-user",function(){
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