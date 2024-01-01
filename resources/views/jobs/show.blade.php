@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <form action="{{ isset($job->id) ? route('jobs.update', $job->id ) : route('job.store') }}" method="POST">
                    {{isset($job->id) ? method_field('PUT') : '' }}
                
                    {!! csrf_field() !!}
            
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Job Details</h5>
                        <small class="text-muted float-end">
                            <input type="submit" class="btn btn-primary" value="Update" />
                        </small>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Address</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input
                                type="text"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                disabled
                                value="{{ $job->address }}"
                                aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Phone No</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-phone"></i
                            ></span>
                            <input
                                type="text"
                                id="basic-icon-default-company"
                                class="form-control"
                                disabled
                                value="{{ $job->phone }}"
                                aria-describedby="basic-icon-default-company2" />
                            </div>
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Job Date</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                            <input
                                type="text"
                                id="basic-icon-default-email"
                                class="form-control"
                                name="deadline"
                                placeholder="john.doe"
                                aria-label="john.doe"
                                value="{{ $job->deadline }}"
                                aria-describedby="basic-icon-default-email2" />
                            </div>
                            
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Job Type</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-home"></i
                            ></span>
                            <select id="defaultSelect" class="form-select" name="service">
                                <option value="{{ $job->serviceType->id }}">{{ $job->serviceType->name }}</option>
                                @foreach ($service_type as $service)
                                    @if ($job->serviceType->id != $service->id)
                                        <option value="{{$service->id}}">{{ $service->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            </div>
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-phone">Job Status</label>
                            <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-home"></i
                                ></span>
                                <select id="defaultSelect" class="form-select" name="status">
                                
                                    <option value="{{$job->status}}">
                                        {{$jobStatus[$job->status] }}
                                    </option>
                                    
                                    @foreach ($jobStatus as $key => $status)
                                        @if ($key != $job->status)
                                            <option value="{{$key}}">{{ $status }}</option>
                                        @endif
                                    @endforeach
                                
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-phone">Payment Method</label>
                            <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-credit-card"></i
                                ></span>
                                <select id="defaultSelect" class="form-select" name="p_method">
                                    <option value="{{ $job->paymentType->id }}">{{ $job->paymentType->method }}</option>
                                    @foreach ($payment_methods as $payment)
                                        @if ($job->paymentType->id != $payment->id)
                                            <option value="{{$payment->id}}">{{ $payment->method }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-message">Total</label>
                            <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-money"></i></span>
                            
                                <input
                                type="text"
                                id="basic-icon-default-email"
                                class="form-control"
                                placeholder="john.doe"
                                aria-label="john.doe"
                                name="total"
                                value="{{ $job->total }}"
                                aria-describedby="basic-icon-default-email2" />
                            </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-message">Customer Message</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"
                                ><i class="bx bx-comment"></i
                            ></span>
                            <textarea
                                id="basic-icon-default-message"
                                class="form-control"
                                placeholder=""
                                disabled
                                aria-describedby="basic-icon-default-message2">{{ $job->customer_notes }}</textarea>
                            </div>
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-message">Admin Message</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-message2" class="input-group-text"
                                    ><i class="bx bx-comment"></i
                                    ></span>
                                    <textarea
                                    id="basic-icon-default-message"
                                    class="form-control"
                                    placeholder="Hi, Do you have a moment to talk Joe?"
                                    aria-label="Hi, Do you have a moment to talk Joe?"
                                    name="admin_notes"
                                    aria-describedby="basic-icon-default-message2">{{ $job->admin_notes }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Created At</label>
                            <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                <input
                                type="text"
                                id="basic-icon-default-email"
                                class="form-control"
                                placeholder="john.doe"
                                aria-label="john.doe"
                                value="{{ $job->created_at }}"
                                disabled
                                aria-describedby="basic-icon-default-email2" />
                            </div>                          
                            </div>
                        </div>                  
                    </div>
                </form>
            </div>
        </div>
       
        <!-- Basic with Icons -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Customer Information</h5>
              <small class="text-muted float-end"> - </small>
            </div>
            <div class="card-body">
              
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Full Name</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                      <input
                        type="text"
                        class="form-control"
                        id="basic-icon-default-fullname"
                        disabled
                        value="{{ $job->user->name }} {{ $job->user->last_name }}"
                        aria-describedby="basic-icon-default-fullname2" />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Address</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                        ><i class="bx bx-map"></i
                      ></span>
                      <input
                        type="text"
                        id="basic-icon-default-company"
                        class="form-control"
                        disabled
                        value="{{ $job->user->address }}"
                        aria-describedby="basic-icon-default-company2" />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                      <input
                        type="text"
                        id="basic-icon-default-email"
                        class="form-control"
                        disabled
                        value="{{ $job->user->email }}"
                        aria-describedby="basic-icon-default-email2" />
                    </div>
                    
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 form-label" for="basic-icon-default-phone">Phone No</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-phone2" class="input-group-text"
                        ><i class="bx bx-phone"></i
                      ></span>
                      <input
                        type="text"
                        id="basic-icon-default-phone"
                        class="form-control phone-mask"
                        disabled
                        value="{{ $job->user->phone }}"
                        aria-describedby="basic-icon-default-phone2" />
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>

       
      </div>
</div>
@endsection
