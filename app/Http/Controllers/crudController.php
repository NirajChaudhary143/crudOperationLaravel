<?php

namespace App\Http\Controllers;
use App\Models\Employee;

use Illuminate\Http\Request;
use PhpOption\None;

class crudController extends Controller
{
    public function index(){
        return view('index');
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
                'phone'=>'required'
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
}
