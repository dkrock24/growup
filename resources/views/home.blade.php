@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Welcome  {{ Auth::user()->name }} 🎉</h5>
                <p class="mb-4">
                  Click here and check jobs listed as <span class="fw-medium">pending</span> to be worked.
                </p>

                <a href="/jobs" class="btn btn-sm btn-outline-primary">Jobs List</a>
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
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <i class="bx bxs-box text-info" style="font-size: 2em"></i>
                  </div>
                </div>
                <span class="fw-medium d-block mb-1">On going</span>
                <h3 class="card-title mb-2">{{ count($ongoing) }}</h3>
                <small class="text-info fw-medium"><i class="bx bx-up-arrow-alt"></i>Last 7 days</small>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <i class="bx bxs-time text-danger" style="font-size: 2em"></i>
                  </div>
                </div>
                <span>Pending</span>
                <h3 class="card-title text-nowrap mb-1">{{ count($pending) }}</h3>
                <small class="text-danger fw-medium"><i class="bx bx-right-arrow-alt"></i>Last 7 days</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Revenue -->
      <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
          <div class="row row-bordered g-0">
            <div class="col-md-12">
              <h5 class="card-header m-0 me-2 pb-3">10 Last InComing Jobs</h5>
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Services Type</th>
                        <th>Job Scheduled</th>
                        <th>Job Status</th>
                        <th width="280px">Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>                  
                          <span class="fw-medium">{{ $job->user->name }} {{ $job->user->last_name }}</span>
                        </td>           
                        <td>
                            {{ $job->serviceType->name }}
                        </td>
                        <td>
                            {{ date('M d-Y', strtotime($job->deadline)) }} &nbsp;&nbsp;&nbsp;
                            <span class="badge bg-secondary">
                              {{ date('H:i A', strtotime($job->deadline)) }}
                            </span>
                        </td>
                        
                      
                        <td>
                          @if($job->status == 0)      
                            <span class="badge bg-label-primary me-1">Pending</span>
                          @elseif($job->status == 1)
                            <span class="badge bg-label-info me-1">On going</span>
                          @elseif($job->status == 2)
                            <span class="badge bg-label-success me-1">Completed</span>
                          @elseif($job->status == 3)
                            <span class="badge bg-label-danger me-1">Canceled</span>
                          @endif
                            

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <form action="{{ route('jobs.show', $job->id) }}" method="POST">
                                    <a class="dropdown-item" href="{{ route('jobs.show', $job->id) }}">
                                        <i class="bx bx-eye me-1"></i> Show / Edit
                                    </a>
                                </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div id="totalRevenueChart" class="px-2"></div>
            </div>
          </div>
        </div>
      </div>
      <!--/ Total Revenue -->
      <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
        <div class="row">
          <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <i class="bx bxs-home text-primary" style="font-size: 2em"></i>
                  </div>

                </div>
                <span class="d-block mb-1">Completed</span>
                <h3 class="card-title text-nowrap mb-2">{{ count($completed) }}</h3>
                <small class="text-primary fw-medium"><i class="bx bx-down-arrow-alt"></i>Last 7 days</small>
              </div>
            </div>
          </div>
          <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <i class="bx bxs-ghost text-success" style="font-size: 2em"></i>
                  </div>

                </div>
                <span class="fw-medium d-block mb-1">Canceled</span>
                <h3 class="card-title mb-2">{{ count($canceled) }}</h3>
                <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i>Last 7 days</small>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

</div>
@endsection
