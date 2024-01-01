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
      <h5 class="card-header">New Catalog</h5>
      <div class="card-body">
        <form action="{{ isset($catalog->id) ? route('catalog.update', $catalog->id ) : route('catalog.store') }}" method="POST">
            {{isset($catalog->id) ? method_field('PUT') : '' }}
        
            {!! csrf_field() !!}
          
             <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name" value={{ old('name', isset($catalog) ? $catalog->name : '') }}>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <input type="text" name="description" class="form-control" placeholder="Description" value={{ old('description', isset($catalog) ? $catalog->description : '') }}>
                    </div>
                    <br/>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Price:</strong>
                        <input type="text" name="price" class="form-control" placeholder="Price" value={{ old('price', isset($catalog) ? $catalog->price : '') }}>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-check form-switch mb-2">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                        @if (isset($catalog))
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="status" {{ old('status', $catalog->status == 1 ? 'checked' : '') }} />
                        @else
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="status" {{ old('status', !isset($catalog) ? '' : '') }} />
                        @endif
                    </div>
                    <br/>
                    <br/>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('catalog.index') }}"> Back</a>
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
