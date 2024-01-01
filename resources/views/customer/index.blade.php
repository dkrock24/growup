@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Customers /</span> List</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Customers</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Created</th>
                <th width="280px">Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @php
                $i = 1;
            @endphp
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $i++ }}</td>
                <td>
                  
                  <span class="fw-medium">{{ $customer->name }}</span>
                </td>
                <td>{{ $customer->last_name }}</td>
                <td>
                    {{ $customer->email }}
                </td>
                
                <td>
                    {{ $customer->created_at }}
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
    
                            <a class="dropdown-item" href="{{ route('customers.show', $customer->id) }}">
                                <i class="bx bx-edit-alt me-1"></i> Edit
                            </a>
   
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Basic Bootstrap Table -->

    <!--/ Responsive Table -->
  </div>
@endsection