<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    // 1 : Create opration

    // Show the registration form 
    public function create()
    {
        return view('employee.RegForm');
    }

    // Store the employee data from the form
    public function store(Request $request)
    {
        logger('store function');
        // Validate the input data
        $request->validate([

            // 'employee_id' => 'required|unique:employees|alpha_num|max:10',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|string|min:8',
            'position' => 'required|string|max:255',
            'project' => 'required|string|max:255',
        ]);

        // Create a new employee record
        $employee = Employee::create([
            // 'employee_id' => $request->employee_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
            'position' => $request->position,
            'project' => $request->project,
        ]);

        
        return redirect()->back()->with('message','Data submitted successfully!');
        
    }

    // 2 : Read opration
    // Show the list of all employees
    public function records()
    {
        logger('Record function');
        // // Retrieve all employee records
        $employee = Employee::all();

        // // Pass the employees data to the view
        return view('records', compact('employee'));

        // return DB::table('employees')->get();

    }

    // 3 : Delete opration
    public function delete_records($id)
    {
        logger('before delete controller function');

        $record = Employee::SELECT('id')
                ->where('id','=',$id)
                ->delete();

        // DB::table('employees')->where('employee_id', $employee_id)->delete();

        return redirect('/employee/records')->with('status', "Data deleted susseccfully !!");
        logger('After delete controller function');
    }


    // 4 : Update opration

    // a :funtion to view the page to edit the data
    public function edit($id)
    {
        $employee = Employee::SELECT('*')
                ->where('id','=',$id)
                ->first();
        // $employee = DB::table('employees')->where('employee_id', $employee_id);
        logger("All data : ".$employee);
        return view('edit', compact('employee'));

    }

    // b :funtion to Update the data

    public function update(Request $request, $id)
{

    $name = $request->input('full_name');
    $email = $request->input('email') ;
    $position = $request->input('position') ;
    $project = $request->input('project') ;
    $data=array('full_name'=>$name,'email'=>$email, 'position'=>$position,'project'=>$project);

    DB::table('employees')
            ->where('id', $id)
            ->update($data);

    // $employee->save();
    
    return redirect('/employee/records')->with('status', "Data updated susseccfully !!");
}

}
