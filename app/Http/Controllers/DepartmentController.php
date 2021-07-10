<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use DataTables;

class DepartmentController extends Controller
{

    
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:department-list', ['only' => ['index','create']]);
		$this->middleware('permission:department-create', ['only' => ['create','store']]);
		$this->middleware('permission:department-edit', ['only' => ['edit','update']]);
		$this->middleware('permission:department-delete', ['only' => ['destroy']]);

    }

    public function index(Request $request)
    {

        $department = new Department();
        dd($department);

        if ($request->ajax()) {
            $data = Department::get();
            return Datatables::of($data)
                ->addIndexColumn()
                
                
                ->addColumn('action', function($row){

					if (Gate::check('department-edit')) {
                        $edit = '<span class="flex justify-center items-center">
                                <a href="'.route('departments.edit', $row->id).'" class="flex items-center text-success">
                                    <i data-feather="edit" class="feather-icon"></i>
                                        '.__('department.form.edit-button').'
                                </a> 
                            </span>&nbsp;';
                    }else{
                        $edit = '';
                    }

                    if (Gate::check('department-delete')) {
                        $delete = '<button class="btn btn-default btn-flat btn-sm text-danger remove-user flex items-center text-danger" data-id="'.$row->id.'" data-action="'.route('departments.destroy').'">
										<i data-feather="delete" class="feather-icon"></i>
		                                '.__('department.form.delete-button').'
									</button>';
                    }else{
                        $delete = '';
                    }


                    $action = $edit.' '.$delete;

                    return $action;
                })

                ->editColumn('created_at', '{{date("jS M Y", strtotime($created_at))}}')
	            ->editColumn('updated_at', '{{date("jS M Y", strtotime($updated_at))}}')
	            ->escapeColumns([])
                ->make(true);
        }
        return view('departments.index');
    }    
    public function create()
    {
        return view('departments.create');
    }   
    
    public function store(Request $request)
    {
        $rules = [
            'name' 			=> 'required|string',
			'code' 		    => 'required|string|unique:departments,code',
			'description' 	=> 'required|string',
        ];

        $messages = [
            'name.required'    		=> __('department.form.validation.name.required'),
            'code.required'    	    => __('department.form.validation.code.required'),
            'code.unique'    		=> __('department.form.validation.code.unique'),
            'description.required' 	=> __('department.form.validation.description.required'),
        ];

        $this->validate($request, $rules, $messages);

		$input = request()->all();

        try {
            $department = Department::create($input);
			
			$success_msg = __('department.message.store.success');
			return redirect()->route('departments.index')->with('success',$success_msg);

		} catch (Execption $e) {
			$error_msg = __('department.message.store.error');
			return redirect()->route('departments.index')->with('error',$error_msg);
		}
    }    
    
    public function edit($id)
    {
        $department = Department::find($id);
        //dd($department);
        return view('departments.edit', compact('department'));
    }    
    
    public function update(Request $request, $id)
    {
        $rules = [
            'name' 			=> 'required|string',
			'code' 		    => 'required|string',
			'description' 	=> 'required|string',
        ];

        $messages = [
            'name.required'    		=> __('department.form.validation.name.required'),
            'code.required'    	    => __('department.form.validation.code.required'),
            'code.unique'    		=> __('department.form.validation.code.unique'),
            'description.required' 	=> __('department.form.validation.description.required'),
        ];

        $this->validate($request, $rules, $messages);
		$input = $request->all();
		$department = Department::find($id);
        //dd($department);

		try {
			$department->update($input);

			$success_msg = __('department.message.update.success');
			return redirect()->route('departments.index')->with('success',$success_msg);

		} catch (Exception $e) {
			$error_msg = __('department.message.update.error');
			return redirect()->route('departments.index')->with('error',$error_msg);
		}
    }    
    
    public function destroy()
    {
        $id = request()->input('id');
		$alluser = Department::all();
		$countalluser = $alluser->count();

		if ($countalluser <= 1) {
			$warning_msg = __('department.message.destroy.warning_last_user');
			return redirect()->route('departments.index')->with('warning',$warning_msg);
		}else{
			$getuser = Department::find($id);

			try {
				Department::find($id)->delete();
				$success_msg = __('department.message.destroy.success');
				return redirect()->route('departments.index')->with('success',$success_msg);
			} catch (Exception $e) {
				$error_msg = __('department.message.destroy.error');
				return redirect()->route('departments.index')->with('error',$error_msg);
			}
		}
    }
}
