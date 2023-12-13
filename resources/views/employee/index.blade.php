@extends('layouts.app')

<style>
    .menu  {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #05548d;
    }

    .menu li {
        float: left;
    }

    .menu li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .menu li a:hover:not(.active) {
        background-color: #111;
    }

    .menu li a.active {
        float: right;
    }

    .active {
        background-color: #4CAF50;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employee List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employees.create')}}"> Create New employee</a>
                <br />
                <br />
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Salary</th>
            <th>Email</th>
            <th>Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td></td>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->age }}</td>
            <td>$ {{ $employee->salary }} USD</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->created_at }}</td>
            <td>
                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
   
    
                    <a class="btn btn-success" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
      
@endsection
