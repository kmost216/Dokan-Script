@extends('layouts.app')
@section('head')
@include('layouts.partials.headersection',['title'=>'Edit Plan'])
@endsection
@section('content')
<div class="row">
	<div class="col-12 mt-2">
		<div class="card">
			<div class="card-body">
				<form method="post" action="{{ route('admin.plan.update',$info->id) }}" class="basicform">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<label>{{ __('Plan Name') }}</label>
								<input type="text" name="name" class="form-control" required value="{{ $info->name }}"> 
							</div>

							<div class="form-group">
								<label>{{ __('Plan description') }}</label>
								<input type="text" class="form-control" required="" name="description" value="{{ $info->description }}"></textarea>
							</div> 


							<div class="form-group">
								<label>{{ __('Plan Price') }}</label>
								<input type="number" step="any" name="price" class="form-control" required value="{{ $info->price }}"> 
							</div>
							

							<div class="form-group">
								<label>{{ __('Product Limit') }}</label>
								<input type="number"  name="product_limit" class="form-control" required value="{{ $info->product_limit }}"> 
							</div>
							<div class="form-group">
								<label>{{ __('Storage Limit') }} (MB)</label>
								<input type="number"  name="storage" class="form-control" required  value="{{ $info->storage }}"> 
							</div>
							<div class="form-group">
								<label>{{ __('Customer Limit') }}</label>
								<input type="number" value="{{ $info->customer_limit }}"  name="customer_limit" class="form-control" required> 
							</div>
							<div class="form-group">
								<label>{{ __('Category Limit') }}</label>
								<input type="number" value="{{ $info->category_limit }}"  name="category_limit" class="form-control" required> 
							</div>
							<div class="form-group">
								<label>{{ __('Location Limit') }}</label>
								<input type="number" value="{{ $info->location_limit }}"  name="location_limit" class="form-control" required> 
							</div>
							<div class="form-group">
								<label>{{ __('Brand Limit') }}</label>
								<input type="number" value="{{ $info->brand_limit }}"  name="brand_limit" class="form-control" required> 
							</div>
							<div class="form-group">
								<label>{{ __('Variation Limit') }}</label>
								<input type="number" value="{{ $info->variation_limit }}"  name="variation_limit" class="form-control" required> 
							</div>
							

							<div class="form-group">
								<button class="btn btn-primary basicbtn" type="submit" >{{ __('Update') }}</button>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>{{ __('Custom Domain') }}</label>
								<select class="form-control" name="custom_domain">
									<option value="1" @if($info->custom_domain==1) selected="" @endif>{{ __('Enable') }}</option>
									<option value="0" @if($info->custom_domain==0) selected="" @endif>{{ __('Disable') }}</option>
								</select>
							</div>
							<div class="form-group">
								<label>{{ __('Duration') }}</label>
								<select class="form-control" name="days">
									<option value="365"@if($info->days==365) selected="" @endif>{{ __('Yearly') }}</option>
									<option value="30"@if($info->days==30) selected="" @endif>{{ __('Monthly') }}</option>

									<option value="7"@if($info->days==7) selected="" @endif>{{ __('Weekly') }}</option>
								</select>
							</div>
							
							<div class="form-group">
								<label>{{ __('Is Featured ?') }}</label>
								<select class="form-control" name="featured">
									<option value="0" @if($info->featured==0) selected="" @endif>{{ __('No') }}</option>
									<option value="1" @if($info->featured==1) selected="" @endif>{{ __('Yes') }}</option>
								</select>
							</div>
							<div class="form-group">
								<label>{{ __('Is Default ?') }}</label>
								<select class="form-control" name="is_default">
									<option value="0" @if($info->is_default == 0) selected @endif>{{ __('No') }}</option>
									<option value="1" @if($info->is_default == 1) selected @endif>{{ __('Yes') }}</option>
								</select>
							</div>
							<div class="form-group">
								<label>{{ __('Status') }}</label>
								<select class="form-control" name="status">
									<option value="1" @if($info->status==1) selected="" @endif>{{ __('Enable') }}</option>
									<option value="0" @if($info->status==0) selected="" @endif>{{ __('Disable') }}</option>
								</select>
							</div>
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