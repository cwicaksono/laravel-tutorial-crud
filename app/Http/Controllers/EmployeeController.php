<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::latest()->paginate(5);
      
        return view('employee.index',compact('employee'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    public function create()
    {
        return view('employee.create');
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
      
        Employee::create($request->all());
       
        return redirect()->route('employee.index')
                        ->with('success','Employee created successfully.');
    }
  
    public function edit(Employee $employee)
    {
        return view('employee.edit',compact('employee'));
    }
  
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
        ]);
      
        $employee->update($request->all());
      
        return redirect()->route('employee.index')
                        ->with('success','Employee updated successfully');
    }
    
    public function destroy(Employee $employee)
    {
        $employee->delete();
       
        return redirect()->route('employee.index')
                        ->with('success','Employee deleted successfully');
    }
}
