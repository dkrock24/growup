@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Catalog /</span> <a href="catalog/create">New</a></h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Catalog</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>price</th>
                <th>Status</th>
                <th>Created</th>
                <th width="280px">Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @php
                $i = 1;
            @endphp
            @foreach ($catalog as $cata)
            <tr>
                <td>{{ $i++ }}</td>

                <td>{{ $cata->name }}</td>
                <td>
                    {{ $cata->description }}
                </td>
                <td>
                    {{ $cata->price }}
                </td>
                <td>
                    @if($cata->status == 1)      
                        <span class="badge bg-label-primary me-1">Active</span>
                    @else
                        <span class="badge bg-label-danger me-1">Disabled</span>
                    @endif
                    
                <td>
                    {{ $cata->created_at }}
                </td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <form action="{{ route('catalog.destroy',$cata->id) }}" method="POST">
                            <a class="dropdown-item" href="{{ route('catalog.edit',$cata->id) }}">
                                <i class="bx bx-edit-alt me-1"></i> Edit
                            </a>
                            <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                            @csrf
                            @method('DELETE')     
                        </form>
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

