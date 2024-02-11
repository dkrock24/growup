@extends('layouts.app')

@section('menu')
@include('layouts.service_menu')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Jobs /</span> <a href="services/create">List</a></h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Jobs</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Services Type</th>
                <th>Job Scheduled</th>
                <th>Price</th>
                <th>Total</th>
                <th>Payment</th>
                <th>Job Status</th>
                <th>Created At</th>
                <th width="280px">Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @php
                $i = $jobs->currentPage() * 10 - 9;
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
                    $ {{ $job->amount }}
                </td>
                <td>
                    $ {{ $job->total }}
                </td>
                <td>
                    Pending
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
                    {{ date('Y M d', strtotime($job->created_at)) }}
                    <span class="badge bg-secondary">
                      {{ date('H:i A', strtotime($job->created_at)) }}
                    </span>
                   
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <form action="{{ route('services.edit',$job->id) }}" method="POST">
                            <a class="dropdown-item" href="{{ route('services.edit', $job->id) }}">
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
        <div class="demo-inline-spacing">
          <!-- Basic Pagination -->
          <nav aria-label="Page navigation">
            <ul class="pagination">
              <li class="page-item first">
                <a class="page-link" href="javascript:void(0);"
                  ><i class="tf-icon bx bx-chevrons-left"></i
                ></a>
              </li>
              <li class="page-item prev">
                <a class="page-link" href="/services/list?page={{$jobs->currentPage()-1}}"
                  ><i class="tf-icon bx bx-chevron-left"></i
                ></a>
              </li>
              
              
              <li class="page-item active">
                <a class="page-link" href="/services/list?page={{$i}}">{{ $jobs->currentPage() }}</a>
              </li>
            
              
              <li class="page-item next">
                <a class="page-link" href="/services/list?page={{$jobs->currentPage()+1}}"
                  ><i class="tf-icon bx bx-chevron-right"></i
                ></a>
              </li>
              <li class="page-item last">
                <a class="page-link" href="javascript:void(0);"
                  ><i class="tf-icon bx bx-chevrons-right"></i
                ></a>
              </li>
            </ul>
          </nav>
          <!--/ Basic Pagination -->
        </div>
      </div>
    </div>
    <!--/ Basic Bootstrap Table -->

    <!--/ Responsive Table -->
  </div>
@endsection

