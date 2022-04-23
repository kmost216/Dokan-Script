@extends('layouts.app')
@section('head')
@include('layouts.partials.headersection',['title'=>'Customer Plan Data'])
@endsection
@section('content')
 <div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>{{ __('Edit Customer Plan Data') }}</h4>
                
      </div>
      <div class="card-body">

        <form class="basicform" action="{{ route('admin.customer.updateplaninfo',$planinfo->id) }}" method="post">
          @csrf
          @method('PUT')

          <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" >{{ __('Plan Name') }}</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" disabled=""  value="{{ $planinfo->name }}">
          </div>
         </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" >{{ __('Product Limit') }}</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" required="" name="product_limit"   value="{{ $planinfo->product_limit }}">
          </div>
         </div>

         <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" >{{ __('Storage Limit') }}</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" required="" name="storage"   value="{{ $planinfo->storage }}">
          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" >{{ __('Customer Limit') }}</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" required="" name="customer_limit"   value="{{ $planinfo->customer_limit }}">
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" >{{ __('Category Limit') }}</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" required="" name="category_limit"   value="{{ $planinfo->category_limit }}">
          </div>
        </div>

       <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" >{{ __('Location Limit') }}</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" required="" name="location_limit"   value="{{ $planinfo->location_limit }}">
          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" >{{ __('Brand Limit') }}</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" required="" name="brand_limit"   value="{{ $planinfo->brand_limit }}">
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" >{{ __('Variation Limit') }}</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" required="" name="variation_limit"   value="{{ $planinfo->variation_limit }}">
          </div>
        </div>

        

             
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
          <div class="col-sm-12 col-md-7">
            <button class="btn btn-primary basicbtn" type="submit">{{ __('Save') }}</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/js/form.js') }}"></script>
@endpush