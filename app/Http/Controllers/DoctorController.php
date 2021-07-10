<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Doctordepartment;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\File;

class DoctorController extends Controller
{

    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:doctor-list', ['only' => ['index','create']]);
		$this->middleware('permission:doctor-create', ['only' => ['create','store']]);
		$this->middleware('permission:doctor-edit', ['only' => ['edit','update']]);
		$this->middleware('permission:doctor-delete', ['only' => ['destroy']]);

    }

    public function index(Request $request)
    {

        //dd(Doctordepartment::get());
         $doctor = new Doctor;
        dd($doctor);

        if ($request->ajax()) {
            $data = Doctor::get();
            return Datatables::of($data)
                ->addIndexColumn()
                
                
                ->addColumn('action', function($row){

					if (Gate::check('doctor-edit')) {
                        $edit = '<span class="flex justify-center items-center">
                                <a href="'.route('doctors.edit', $row->id).'" class="flex items-center text-success">
                                    <i data-feather="edit" class="feather-icon"></i>
                                        '.__('doctor.form.edit-button').'
                                </a> 
                            </span>&nbsp;';
                    }else{
                        $edit = '';
                    } 

                    if (Gate::check('doctor-delete')) {
                        $delete = '<button class="btn btn-default btn-flat btn-sm text-danger remove-user flex items-center text-danger" data-id="'.$row->id.'" data-action="'.route('doctors.destroy').'">
										<i data-feather="delete" class="feather-icon"></i>
		                                '.__('doctor.form.delete-button').'
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

                ->editColumn('created_at', '{{date("jS M Y", strtotime($created_at))}}')
	            ->editColumn('updated_at', '{{date("jS M Y", strtotime($updated_at))}}')
	            ->escapeColumns([])
                ->make(true);
        }
        return view('doctors.index');
    }

    public function create()
    {
        $departments = Department::all();
        return view('doctors.create',compact('departments'));
    }

    public function store(Request $request)
    {
        //return $req->all();

        //dd($request->all());

        $rules = [
            'name' 			=> 'required|string',
			'email' 		=> 'required|email|unique:doctors,email',
			'description' 	=> 'required|string',
			'role' 		    => 'required|integer',
			'image' 		=> 'nullable',
			//'department' 	=> 'integer',
        ];

        $messages = [
            'name.required'    		=> __('doctor.form.validation.name.required'),
            'email.required'    	=> __('doctor.form.validation.email.required'),
            'email.email'    		=> __('doctor.form.validation.email.email'),
            'email.unique'    		=> __('doctor.form.validation.email.unique'),
            'description.required' 	=> __('doctor.form.validation.description.required'),
            'role.required'     	=> __('doctor.form.validation.roles.required'),
            'image.required'    	=> __('doctor.form.validation.image.required'),
        ];

        $this->validate($request, $rules, $messages);

		$input = request()->all();

        try {
			$doctor = Doctor::create($input);

			//dd($doctor->id);
            // $doctorId = $doctor->id;
            // $departmentId = $request->department;
            // //dd($departmentId);
            // foreach($departmentId as $item)
            // {
            //     $datasave = [
            //         'doctor_id'     => $doctorId,
            //         'department_id' => $item,
            //     ];
            //     //dd($datasave);
            //     Doctordepartment::create($datasave);
            // }
           
			$success_msg = __('doctor.message.store.success');
			return redirect()->route('doctors.index')->with('success',$success_msg);

		} catch (Execption $e) {
			$error_msg = __('doctor.message.store.error');
			return redirect()->route('doctors.index')->with('error',$error_msg);
		}
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.edit', compact('doctor'));
    } 

    public function update(Request $request, $id)
    {
        $rules = [
            'name' 			=> 'required|string',
			'email' 		=> 'required|email|unique:doctors,email,'.$id,
			'description' 	=> 'required|string',
			'role' 		    => 'required|integer',
			'image' 		=> 'nullable',
        ];

        $messages = [
            'name.required'    		=> __('doctor.form.validation.name.required'),
            'email.required'    	=> __('doctor.form.validation.email.required'),
            'email.email'    		=> __('doctor.form.validation.email.email'),
            'email.unique'    		=> __('doctor.form.validation.email.unique'),
            'description.required' 	=> __('doctor.form.validation.description.required'),
            'role.required'     	=> __('doctor.form.validation.roles.required'),
            'image.required'    	=> __('doctor.form.validation.image.required'),
        ];

        $this->validate($request, $rules, $messages);

        //return $request->all();

		$input = $request->all();
        //dd($input);
		$doctor = Doctor::find($id);

        //dd($doctor);

        if (empty($input['image'])) {
			$input['image'] = $doctor->image;
		}

		try {
			$doctor->update($input);

			$success_msg = __('doctor.message.update.success');
			return redirect()->route('doctors.index')->with('success',$success_msg);

		} catch (Exception $e) {
			$error_msg = __('doctor.message.update.error');
			return redirect()->route('doctors.index')->with('error',$error_msg);
		}

    } 

    public function destroy()
    {
        $id = request()->input('id');
		$alluser = Doctor::all();
		$countalluser = $alluser->count();

		if ($countalluser <= 1) {
			$warning_msg = __('doctor.message.destroy.warning_last_user');
			return redirect()->route('doctors.index')->with('warning',$warning_msg);
		}else{
			$getuser = Doctor::find($id);
			if(!empty($getuser->image)){
				$image_path = 'storage/'.$getuser->image;
				if(File::exists($image_path)) {
				    File::delete($image_path);
				}
			}
			try {
				Doctor::find($id)->delete();
				$success_msg = __('doctor.message.destroy.success');
				return redirect()->route('doctors.index')->with('success',$success_msg);
			} catch (Exception $e) {
				$error_msg = __('doctor.message.destroy.error');
				return redirect()->route('doctors.index')->with('error',$error_msg);
			}
		}
    }
}
