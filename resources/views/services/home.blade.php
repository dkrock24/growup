@extends('layouts.app')

@section('menu')
@include('layouts.service_menu')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Welcome {{ Auth::user()->name }} 🎉</h5>
                <p class="mb-4">
                  Check your services <span class="fw-medium">Here</span>
                </p>

                <a href="/services/list" class="btn btn-sm btn-outline-primary">View Jobs</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img
                  src={{ Vite::asset('resources/assets/img/illustrations/man-with-laptop-light.png') }}
                  height="140"
                  alt="View Badge User"
                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12 mb-4">
            <div class="card">
              <div class="row row-bordered g-5">
                <div class="col-md-5">
                  <h5 class="card-header m-0 me-2 pb-3">Coming Job</h5>
                  <div id="totalRevenueChart" class="px-4">
                    {{ date('M d, Y', strtotime($jobs[0]->deadline)) }}
                  </div>
                </div>
                <div class="col-md-7">
    
                  <div id="growthChart"></div>
                  <div class="text-left fw-medium pt-1 mb-4">
                    &nbsp; Job Type: {{ $jobs[0]->serviceType->name}}
                  </div>
                  <div class="text-left fw-medium pt-1 mb-3">
                    &nbsp; Address: {{ $jobs[0]->address}}
                  </div>
    
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- Total Revenue -->

      <!--/ Total Revenue -->

    </div>
    <div class="row">
      <!-- Order Statistics -->
      <div class="col-md-6 col-lg-8 col-xl-8 order-0 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between pb-0">
            <div class="card-title mb-0">
              <h5 class="m-0 me-2">Jobs Statistics</h5>
              <small class="text-muted">Jobs Total : </small>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="d-flex flex-column align-items-center gap-1">
                <h2 class="mb-2">{{count($jobList)}}</h2>
                <span>Jobs</span>
              </div>
              <div id="orderStatisticsChart"></div>
            </div>
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-danger"><i class='bx bxs-bell-ring' ></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Pending</h6>
                    <small class="text-muted">Jobs to be worked in the future.</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-medium">{{ count($pending) }}</small>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-success"><i class='bx bxs-bell' ></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">On going</h6>
                    <small class="text-muted">Jobs in progress.</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-medium">{{ count($ongoing) }}</small>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-info"><i class='bx bxs-bell' ></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Completed</h6>
                    <small class="text-muted">Jobs already finished.</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-medium">{{ count($completed) }}</small>
                  </div>
                </div>
              </li>
              <li class="d-flex">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-secondary"><i class='bx bxs-bell' ></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Canceled</h6>
                    <small class="text-muted">Total of jobs that were canceled. </small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-medium">{{ count($canceled) }}</small>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ Order Statistics -->

      <!-- Expense Overview -->

      <!--/ Expense Overview -->

      <!-- Transactions -->
      <div class="col-md-6 col-lg-4 order-2 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Contact Information</h5>
            <div class="dropdown">
              <button
                class="btn p-0"
                type="button"
                id="transactionID"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-primary"
                    ><i class="bx bx-map-alt"></i
                  ></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Address</small>
                    <h6 class="mb-0">{{ $customer->address }}</h6>
                  </div>
                 
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-primary"
                    ><i class="bx bx-mobile-alt"></i
                  ></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Phone</small>
                    <h6 class="mb-0">{{ $customer->phone }}</h6>
                  </div>                  
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-primary">
                    <i class='bx bx-envelope'></i>
                  </span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Email</small>
                    <h6 class="mb-0">{{ $customer->email }}</h6>
                  </div>                  
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ Transactions -->
    </div>
</div>
@endsection
