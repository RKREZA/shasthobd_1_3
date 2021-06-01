<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use DB;
use Hash;
use DataTables;
use Image;
use Storage;
use Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{

	function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:user-list', ['only' => ['index','store']]);
		$this->middleware('permission:user-create', ['only' => ['create','store']]);
		$this->middleware('permission:user-edit', ['only' => ['edit','update']]);
		$this->middleware('permission:user-delete', ['only' => ['destroy']]);
		$this->middleware('permission:profile-index', ['only' => ['index']]);
		$this->middleware('permission:profile-update', ['only' => ['profile','profile_update']]);

        $permissions_user_list = Permission::get()->filter(function($item) {
            return $item->name == 'user-list';
        })->first();
        $permissions_user_create = Permission::get()->filter(function($item) {
            return $item->name == 'user-create';
        })->first();
        $permissions_user_edit = Permission::get()->filter(function($item) {
            return $item->name == 'user-edit';
        })->first();
        $permissions_user_delete = Permission::get()->filter(function($item) {
            return $item->name == 'user-delete';
        })->first();
        $permissions_profile_index = Permission::get()->filter(function($item) {
            return $item->name == 'profile-index';
        })->first();
        $permissions_profile_update = Permission::get()->filter(function($item) {
            return $item->name == 'profile-update';
        })->first();


        if ($permissions_user_list == null) {
            Permission::create(['name'=>'user-list']);
        }
        if ($permissions_user_create == null) {
            Permission::create(['name'=>'user-create']);
        }
        if ($permissions_user_edit == null) {
            Permission::create(['name'=>'user-edit']);
        }
        if ($permissions_user_delete == null) {
            Permission::create(['name'=>'user-delete']);
        }
        if ($permissions_profile_index == null) {
            Permission::create(['name'=>'profile-index']);
        }
        if ($permissions_profile_update == null) {
            Permission::create(['name'=>'profile-update']);
        }
	}


	public function index(Request $request)
	{
		
		if ($request->ajax()) {
            $data = User::get();
            return Datatables::of($data)
                ->addIndexColumn()
                
                
                ->addColumn('action', function($row){

					if (Gate::check('user-edit')) {
                        $edit = '<span class="flex justify-center items-center">
                                <a href="'.route('users.edit', $row->id).'" class="flex items-center text-success">
                                    <i data-feather="edit" class="feather-icon"></i>
                                        '.__('user.form.edit-button').'
                                </a> 
                            </span>&nbsp;';
                    }else{
                        $edit = '';
                    }

                    if (Gate::check('user-delete')) {
                        $delete = '<button class="btn btn-default btn-flat btn-sm text-danger remove-user flex items-center text-danger" data-id="'.$row->id.'" data-action="'.route('users.destroy').'">
										<i data-feather="delete" class="feather-icon"></i>
		                                '.__('user.form.delete-button').'
									</button>';
                    }else{
                        $delete = '';
                    }


                    $action = $edit.' '.$delete;

                    return $action;
                })

                ->addColumn('image', function($row){
                    

                    if ($row->image == null or empty($row->image)) {
                    	$image = '<img src="/assets/images/user.png" style="height:50px;">';
                    }else{
                    	$image = '<img src="'.$row->image.'" style="height: 50px;">';
                    }

                    return $image;
                })
                ->rawColumns(['action', 'image'])

	            ->addColumn('role', function ($user) {
	                $role = str_replace(array('[',']'),'',$user->getRoleNames());
	                return $role = str_replace(array('"'),' ',$role);
	            })

                ->editColumn('created_at', '{{date("jS M Y", strtotime($created_at))}}')
	            ->editColumn('updated_at', '{{date("jS M Y", strtotime($updated_at))}}')
	            ->escapeColumns([])
                ->make(true);
        }
      
        return view('users.index');
   
	}

	public function create()
	{
		$roles = Role::pluck('name','name')->all();
		return view('users.create',compact('roles'));
	}

	public function store(Request $request)
	{
		$rules = [
            'name' 			=> 'required',
			'email' 		=> 'required|email|unique:users,email',
			'password' 		=> 'required|same:confirm-password',
			'roles' 		=> 'required',
			'mobile' 		=> 'required|string',
			'image' 		=> 'required',
        ];

        $messages = [
            'name.required'    		=> __('user.form.validation.name.required'),
            'email.required'    	=> __('user.form.validation.email.required'),
            'email.email'    		=> __('user.form.validation.email.email'),
            'email.unique'    		=> __('user.form.validation.email.unique'),
            'password.required'    	=> __('user.form.validation.password.required'),
            'password.same'    		=> __('user.form.validation.password.same'),
            'roles.required'    	=> __('user.form.validation.roles.required'),
            'mobile.required'    	=> __('user.form.validation.mobile.required'),
            'image.required'    	=> __('user.form.validation.image.required'),
        ];


        $this->validate($request, $rules, $messages);

		$input = request()->all();

		$input['password'] = Hash::make($input['password']);

		try {
			$user = User::create($input);
			$user->assignRole($request->input('roles'));

			$success_msg = __('user.message.store.success');
			return redirect()->route('users.index')->with('success',$success_msg);

		} catch (Exception $e) {
			$error_msg = __('user.message.store.error');
			return redirect()->route('users.index')->with('error',$error_msg);
		}

	}


	public function edit($id)
	{
		$user = User::find($id);
		$roles = Role::pluck('name','name')->all();
		$userRole = $user->roles->pluck('name','name')->all();
		return view('users.edit',compact('user','roles','userRole'));
	}

	public function update(Request $request, $id)
	{

		$rules = [
            'name' 			=> 'required',
			'email' 		=> 'required|email|unique:users,email,'.$id,
			'password' 		=> 'same:confirm-password',
			'roles' 		=> 'required',
			'mobile' 		=> 'nullable|string',
			'image' 		=> 'nullable',
        ];

        
        $messages = [
            'name.required'    		=> __('user.form.validation.name.required'),
            'email.required'    	=> __('user.form.validation.email.required'),
            'email.email'    		=> __('user.form.validation.email.email'),
            'email.unique'    		=> __('user.form.validation.email.unique'),
            'password.required'    	=> __('user.form.validation.password.required'),
            'password.same'    		=> __('user.form.validation.password.same'),
            'roles.required'    	=> __('user.form.validation.roles.required'),
            'mobile.required'    	=> __('user.form.validation.mobile.required'),
        ];

        
        $this->validate($request, $rules, $messages);


		$input = $request->all();

		$user = User::find($id);

		if (empty($input['image'])) {
			$input['image'] = $user->image;
		}


		if(!empty($input['password'])){
			$input['password'] = Hash::make($input['password']);
		}else{
			$input['password'] = $user->password;
		}

		try {
			$user->update($input);
			DB::table('model_has_roles')->where('model_id',$id)->delete();
			$user->assignRole($request->input('roles'));

			$success_msg = __('user.message.update.success');
			return redirect()->route('users.index')->with('success',$success_msg);

		} catch (Exception $e) {
			$error_msg = __('user.message.update.error');
			return redirect()->route('users.index')->with('error',$error_msg);
		}

	}

	public function destroy()
	{

		$id = request()->input('id');
		$alluser = User::all();
		$countalluser = $alluser->count();

		if ($countalluser <= 1) {
			$warning_msg = __('user.message.destroy.warning_last_user');
			return redirect()->route('users.index')->with('warning',$warning_msg);
		}else{
			$getuser = User::find($id);
			if(!empty($getuser->image)){
				$image_path = 'storage/'.$getuser->image;
				if(File::exists($image_path)) {
				    File::delete($image_path);
				}
			}
			try {
				User::find($id)->delete();
				$success_msg = __('user.message.destroy.success');
				return redirect()->route('users.index')->with('success',$success_msg);
			} catch (Exception $e) {
				$error_msg = __('user.message.destroy.error');
				return redirect()->route('users.index')->with('error',$error_msg);
			}
		}
			
	}



	public function profile()
	{
		return view('users.profile');
	}

	public function profile_update(Request $request)
	{
		$rules = [
            'password' 	=> 'required|string|min:6|same:confirm-password',
        ];

        $messages = [
            'password.required'    	=> __('user.form.validation.password.required'),
            'password.same'    		=> __('user.form.validation.password.same'),
        ];

        $this->validate($request, $rules, $messages);

		$id = Auth::user()->id;
		$input = $request->all();
		$input['password'] = Hash::make($input['password']);

		try {
			$user = User::whereId($id)->update([
				'password' => $input['password']
			]);

			$success_msg = __('user.message.profile.success');
			return redirect()->route('profile')->with('success',$success_msg);

		} catch (Exception $e) {
			$error_msg = __('user.message.profile.error');
			return redirect()->route('profile')->with('error',$error_msg);
		}
		
	}



}