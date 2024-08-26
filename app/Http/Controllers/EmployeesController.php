<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmployeesController extends Controller
{
    public function employeesForm(){
        return view('admin/add-employees');
    }

    public function addEmployees(Request $request){
       $name = request()->name;
       $role = request()->role;
       $salary = request()->salary;
       $phone = request()->phone;

       $employees = new Employees();
       $employees->name = $name;
       $employees->role = $role;
       $employees->salary = $salary;
       $employees->phone = $phone;
       $employees->save();

       return redirect()->back();
    }

    public function showAllEmployees(){
        $employees = Employees::select('id', 'name', 'role', 'salary', 'phone')->get();
        return view('admin/all-employees', compact('employees'));
    }

    public function showUpdateEmployeesForm(Request $request, $id){
        $employee = Employees::where('id', $id)->first();
        return view('admin/update-employees', compact('employee'));
    }

    public function updateEmployees(Request $request, $id){
        // Find the employee by ID
        $employee = Employees::find($id);
        $employee->name = $request->input('name');
        $employee->role = $request->input('role');
        $employee->salary = $request->input('salary');
        $employee->phone = $request->input('phone');

        $employee->save();
        return redirect()->route('showAllEmployees');
    }

    public function deleteEmployees(Request $request){
        $employeeID = request()->id;
        $employee = Employees::find($employeeID);
        if($employee !== NULL){
            $employee->delete();
        }

         return redirect()->route('showAllEmployees')->with('success', 'Employee deleted successfully');
    }

    public function tableEmployees(){
        $query = Employees::select('id', 'name', 'role', 'salary', 'phone');

        return DataTables::of($query)->make(true);
    }
}