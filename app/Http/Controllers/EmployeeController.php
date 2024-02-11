<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $result = Employee::all()->sortByDesc("id");
        return view('employee/index', [
            'activeMenu' => 'Employees',
            'employees' => $result
        ]);
    }

    public function create()
    {
        return view('employee/create');
    }

    public function store(Request $request) {
        $data =  $request->all();
        isset($data['status']) ? $data['status'] = 1 : $data['status'] = 0;

        Employee::create($data);
        return redirect('employees')->with('message', 'Record was created!');
    }

    public function show($id) {
        $employee = Employee::find($id);
        return view('employee/update', [
            'activeMenu' => 'Employees',
            'employee'=> $employee
        ]);
    }

    public function edit($id) {
        $employee = Employee::find($id);
        return view('employee/create', [
            'activeMenu' => 'Employees',
            'employee'=> $employee
        ]);
    }

    public function update(Request $request, $id) {
        $employee = Employee::find($id);
        $data =  $request->all();
        isset($data['status']) ? $data['status'] = 1 : $data['status'] = 0;


        $employee->update($data);

        return redirect('employees')->with('message','Employee has been updated!');
    }

    public function destroy($id) {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('employees')->with('message','Employee has been deleted.');
    }

}
