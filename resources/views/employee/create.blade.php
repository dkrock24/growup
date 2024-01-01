@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            
            <br/>
        </div>
       
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">New Employee</h5>
      <div class="card-body">
        <form action="{{ isset($employee->id) ? route('employees.update', $employee->id ) : route('employees.store') }}" method="POST">
            {{isset($employee->id) ? method_field('PUT') : '' }}
        
            {!! csrf_field() !!}
          
             <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>First Name:</strong>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" value={{ old('first_name', isset($employee) ? $employee->first_name : '') }}>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Last Name:</strong>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value={{ old('last_name', isset($employee) ? $employee->last_name : '') }}>
                    </div>
                    <br/>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Age:</strong>
                        <input type="text" name="age" class="form-control" placeholder="Age" value={{ old('age', isset($employee) ? $employee->age : '') }}>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Salary:</strong>
                        <input type="text" name="salary" class="form-control" placeholder="Salary" value={{ old('salary', isset($employee) ? $employee->salary : '') }}>
                    </div>
                    <br/>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Schedule:</strong>
                        <input type="text" name="schedule" class="form-control" placeholder="Schedule" value={{ old('schedule', isset($employee->age)) }}>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Email" value={{ old('email', isset($employee) ? $employee->email : '') }}>
                    </div>
                    <br/>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-check form-switch mb-2">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                        @if (isset($employee))
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="status" {{ old('status', $employee->status == 1 ? 'checked' : '') }} />
                        @else
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="status" {{ old('status', !isset($employee) ? '' : '') }} />
                        @endif
                    </div>
                    <br/>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('employees.index') }}"> Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
           
        </form>
      </div>
    </div>
  </div>
   

</div>
@endsection
