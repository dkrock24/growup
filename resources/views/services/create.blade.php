@extends('layouts.app')

@section('menu')
@include('layouts.service_menu')
@endsection

<script src="https://applepay.cdn-apple.com/jsapi/v1.1.0/apple-pay-sdk.js"></script>

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

<style>
.apple-pay-button {
    display: inline-block;
    -webkit-appearance: -apple-pay-button;
    -apple-pay-button-type: donate; /* Use any supported button type. */
}
.apple-pay-button-black {
    -apple-pay-button-style: black;
}
.apple-pay-button-white {
    -apple-pay-button-style: white;
}
.apple-pay-button-white-with-line {
    -apple-pay-button-style: white-outline;
}
    </style>

<div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">New Job</h5>
      <div class="card-body">
        <form action="{{ isset($job->id) ? route('services.update', $job->id ) : route('services.store') }}" method="POST">
            {{isset($job->id) ? method_field('PUT') : '' }}
        
            {!! csrf_field() !!}
          
             <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Default service</label>
                        <select id="defaultSelect" class="form-select" name="service">
                            @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{  $service->name .' $ '. $service->price }}</option>
                            @endforeach
                        </select>
                      </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label"><strong>Address: </strong></label>
                        <input type="text" name="address" class="form-control" value="{{ $customer->address }}">
                    </div>
                    <br/>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label"><strong>Phone:</strong></label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone" value={{ old('age', isset($customer) ? $customer->phone : '') }}>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label"><strong>Schedule a date:</strong></label>
                        <input
                            name="deadline"
                            class="form-control"
                            type="datetime-local"
                            value="{{ $deadline }}"
                            id="html5-datetime-local-input" />
                    </div>
                    <br/>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label"><strong>Email:</strong></label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value={{ old('email', isset($customer) ? $customer->email : '') }}>
                    </div>
                    <br/>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label class="form-label" for="exampleFormControlTextarea1"><strong>Payment Method:</strong></label>
                    <select id="defaultSelect" class="form-select" name="payment_id">
                        @foreach ($payment_methods as $method)
                        <option value="{{ $method->id }}">{{  $method->method }}</option>
                        @endforeach                          
                    </select>
                </div>
                <br/>
                <div class="apple-pay-button apple-pay-button-black">
                </div>
                <apple-pay-button buttonstyle="black" type="buy" locale="el-GR">Pay</apple-pay-button>
            </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-check form-switch mb-0">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Disclaimer :</label>
                        The job will be done if the payment was made.
                    </div>
                    <br/>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label"><strong>Notes:</strong></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="customer_notes"></textarea>
                    </div>
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
