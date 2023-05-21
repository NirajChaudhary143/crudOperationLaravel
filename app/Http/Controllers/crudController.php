<?php

namespace App\Http\Controllers;
use App\Models\Employee;
// use App\Http\Controllers\confirm;

use Illuminate\Http\Request;
use PhpOption\None;
use PhpParser\Node\Expr\Empty_;

class crudController extends Controller
{
    public function index(){
        
        $employees = Employee::all();
        $data = compact('employees');
        return view('index')->with($data);
    }

    public function viewEmployeeAddForm(){
        return view('addEmployee');
    }

    public function addEmployee(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email|unique:employees',
                'address'=>'required',
                'phone'=>'required|size:10'
            ]
        );
        $employee = new Employee();
        $employee->name = $request['name'];
        $employee->email = $request['email'];
        $employee->address = $request['address'];
        $employee->phone = $request['phone'];
        $result = $employee->save();
        
        if($result){
            return redirect('/')->with('success','Information Added Succesfully');
        }
        else{
            return redirect('/add-employee-form')->with('fail','Information not added');
        }
    }
    

    public function deleteEmployee($id){
        $employee= Employee::find($id);
        if($employee){
            $employee->delete();
            return redirect('/')->with('success','Employee Deleted Succesfully');

        }
        else{
            return redirect('/')->with('fail','Employee doesnot delete');
        }
    }
    public function editEmployee($id){
        $employee = Employee::find($id);
        if($employee){
        return view('editEmployee',compact('employee','id'));
        }
        else{
            return view('editEmployee');
        }
    }

    public function updateEmployee(Request $request,$id){
        $employee = Employee::find($id);
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'address'=>'required',
                'phone'=>'required|size:10'

            ]
            );
        $employee->name= $request['name'];
        $employee->email= $request['email'];
        $employee->address= $request['address'];
        $employee->phone= $request['phone'];
        $employee->save();
        $employees=Employee::all();
        return redirect('/')->with(['employees' => $employees, 'success' => 'Updated successfully']);
    }

}

