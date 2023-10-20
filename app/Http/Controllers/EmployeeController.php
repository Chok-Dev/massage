<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employee(){
        $title = 'Are you sure you want to delete this employee?!';
        $text = "";
        confirmDelete($title, $text);
        $e =  Employee::all();
        return view('admin.employee')->with('data', $e);
    }
    public function Addemployee(Request $request){
        $ae = new Employee();
        $ae->emp_name = $request->name;
        $ae->emp_tel = $request->tel;
        $ae->emp_color = $request->color;
        if ($ae->save()) {
            alert()->success('Success', 'Add Employee Success.');
        } else {
            alert()->error('Error', 'Add Employee Error.');
        }
        return redirect()->route('employee');
    }
    public function Upemployee(Request $request){
        $ae = Employee::find($request->id);
        $ae->emp_name = $request->name1;
        $ae->emp_tel = $request->tel1;
        $ae->emp_color = $request->color1;
        if ($ae->save()) {
            alert()->success('Success', 'Update Employee Success.');
        } else {
            alert()->error('Error', 'Update Employee Error.');
        }
        return redirect()->route('employee');
    }

    public function Delemployee(Employee $emp){
        if ($emp->delete()) {
            alert()->success('Success', 'Delete Employee Success.');
        } else {
            alert()->error('Error', 'Delete Employee Error.');
        }
        return redirect()->route('employee');
    }
}
