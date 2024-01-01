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
      <h5 class="card-header">Show Customer</h5>
      <div class="card-body">
        <form action="{{ isset($customer->id) ? route('customers.update', $customer->id ) : route('customers.store') }}" method="POST">
            {{isset($customer->id) ? method_field('PUT') : '' }}
        
            {!! csrf_field() !!}
          
             <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>First Name:</strong>
                                <input type="text" name="name" class="form-control" disabled placeholder="First Name" value={{ old('first_name', isset($customer) ? $customer->name : '') }}>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Last Name:</strong>
                                <input type="text" name="last_name" class="form-control" disabled placeholder="Last Name" value={{ old('last_name', isset($customer) ? $customer->last_name : '') }}>
                            </div>
                            <br/>
                        </div>
        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="email" name="email" class="form-control" disabled placeholder="Email" value={{ old('email', isset($customer) ? $customer->email : '') }}>
                            </div>
                            <br/>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Address:</strong> <br>
                                {{ $customer->address }}
                            </div>
                            <br/>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Phone:</strong> <br>
                                {{ $customer->phone }}
                            </div>
                            <br/>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Created at:</strong> <br>
                                {{ $customer->created_at }}
                            </div>
                            <br/>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('customers.index') }}"> Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-6 col-md-6 col-lg-6 order-3 order-md-2">
                    <div class="row">
                      <div class="col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <h1><i class="menu-icon tf-icons bx bx-door-open" style="font-size: 1em;"></i></h1>
                              </div>

                            </div>
                            <span class="d-block mb-1">Pending Jobs</span>
                            <h3 class="card-title text-nowrap mb-2">{{ $totals['activeJobs'] }}</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <h1><i class="menu-icon tf-icons bx bxs-door-open" style="font-size: 1em;"></i></h1>
                              </div>

                            </div>
                            <span class="fw-medium d-block mb-1">Closed Jobs</span>
                            <h3 class="card-title mb-2">{{ $totals['inactiveJobs'] }}</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                              <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                    <div class="avatar flex-shrink-0">
                                        <h1><i class="menu-icon tf-icons bx bxs-folder-open" style="font-size: 1em;"></i></h1>
                                      </div>
                                  <h5 class="text-nowrap mb-2">Total of jobs</h5>
                                </div>
                                <div class="mt-sm-auto">
                    
                                  <h3 class="text-success mb-0">{{ $totals['totalJobs'] }}</h3>
                                </div>
                              </div>
                              <div id="profileReportChart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                
            </div>

        </form>
      </div>
    </div>
  </div>
   

</div>
@endsection
