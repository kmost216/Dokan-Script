@extends('layouts.app')
@section('head')
@include('layouts.partials.headersection',['title'=>'Make Order'])
@endsection
@section('content')
<div class="row justify-content-center">
	@foreach($posts as $row)
	<div class="col-12 col-md-4 col-lg-4">
		<div class="pricing @if($row->featured==1) pricing-highlight @endif">
			<div class="pricing-title">
				{{ $row->name }}
			</div>
			<div class="pricing-padding">
				<div class="pricing-price">
					<div>{{ amount_format($row->price) }}</div>
					<div>@if($row->days == 365) {{ __('Yearly') }} @elseif($row->days == 30) Monthly @else {{ $row->days }}  Days @endif</div>
					<p>{{ $row->description }}</p>
				</div>
				<div class="pricing-details">
					<div class="pricing-item">
						
						<div class="pricing-item-label">{{ __('Products Limit') }} {{ $row->product_limit }}</div>
					</div>
					<div class="pricing-item">
						
						<div class="pricing-item-label">{{ __('Storage Limit') }} {{ number_format($row->storage) }}MB</div>
					</div>
					<div class="pricing-item">						
						<div class="pricing-item-label">{{ __('Customer Limit') }} {{ number_format($row->customer_limit) }}</div>
					</div>
					<div class="pricing-item">						
						<div class="pricing-item-label">{{ __('Shipping Zone Limit') }} {{ number_format($row->location_limit) }}</div>
					</div>
					<div class="pricing-item">						
						<div class="pricing-item-label">{{ __('Category Limit') }} {{ number_format($row->category_limit) }}</div>
					</div>
					<div class="pricing-item">						
						<div class="pricing-item-label">{{ __('Brand Limit') }} {{ number_format($row->brand_limit) }}</div>
					</div>
					<div class="pricing-item">						
						<div class="pricing-item-label">{{ __('Product Variation Limit') }} {{ number_format($row->variation_limit) }}</div>
					</div>

					<div class="pricing-item">
						<div class="pricing-item-label text-left">{{ __('Use your own domain') }} &nbsp&nbsp</div>
						@if($row->custom_domain == 1)
						<div class="pricing-item-icon "><i class="fas fa-check"></i></div>
						@else
						<div class="pricing-item-icon  bg-danger text-white"><i class="fas fa-times"></i></div>
						@endif
					</div>
					
					<div class="pricing-item">
						<div class="pricing-item-label text-left">{{ __('Google Analytics') }} &nbsp&nbsp</div>
						
						<div class="pricing-item-icon "><i class="fas fa-check"></i></div>
					
					</div>
					
					<div class="pricing-item">
						<div class="pricing-item-label text-left">{{ __('Facebook Pixel') }} &nbsp&nbsp</div>
						
						<div class="pricing-item-icon "><i class="fas fa-check"></i></div>
						
					</div>
					
					<div class="pricing-item">
						<div class="pricing-item-label text-left">{{ __('Google Tag Manager') }} &nbsp&nbsp</div>
						
						<div class="pricing-item-icon "><i class="fas fa-check"></i></div>
						
					</div>
					
					<div class="pricing-item">
						<div class="pricing-item-label text-left">{{ __('Whatsapp Plugin') }} &nbsp&nbsp</div>
						
						<div class="pricing-item-icon "><i class="fas fa-check"></i></div>
						
					</div>
					
					
				</div>
			</div>
			<div class="pricing-cta">
				<a href="#" data-toggle="modal" data-target="#exampleModal" onclick="openModal({{ $row->id }})">{{ __('Proceed') }} <i class="fas fa-arrow-right"></i></a>
			</div>
		</div>
	</div>
	@endforeach	
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">{{ __('Make Renew') }}</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{ route('admin.order.store') }}" id="productform">
					@csrf
					<div class="form-group">
						<label>{{ __('Customer Email') }}</label>
						<input type="email" name="email" required="" class="form-control" value="{{ $email ?? '' }}">
					</div>
					<div class="form-group">
						<label>{{ __('Plan') }}</label>
						<select class="form-control" name="plan" id="plan">
							@foreach($posts as $row)
							<option value="{{ $row->id }}">{{ $row->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>{{ __('Payment Mode') }}</label>
						<select class="form-control" name="payment_method">
							@foreach($payment_getway as $row)
							<option value="{{ $row->id }}">{{ $row->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>{{ __('Transaction Id') }}</label>
						<input type="text" name="transition_id" required="" class="form-control">
					</div>
					<div class="form-group">
						<label>{{ __('Payment Status') }}</label>
						<select class="form-control" name="payment_status">
							<option value="1">{{ __('Complete') }}</option>
							<option value="0">{{ __('Decline') }}</option>
						</select>
					</div>
					<div class="form-group">
						<label>{{ __('Send Email To Customer ?') }}</label>
						<select class="form-control" name="notification_status" id="notification_status">
							<option value="yes">{{ __('Yes') }}</option>
							<option value="no" selected="">{{ __('No') }}</option>
						</select>
					</div>
					<div class="form-group">
						<label>{{ __('Order Status') }}</label>
						<select class="form-control" name="order_status">
							<option value="1">{{ __('Approved') }}</option>
							<option value="2">{{ __('Pending') }}</option>
							<option value="3">{{ __('Expired') }}</option>
							<option value="0">{{ __('Decline') }}</option>

						</select>
					</div>
					<div class="form-group none" id="email_content">
						<label>{{ __('Email Comment') }}</label>
						<textarea class="form-control" name="content"></textarea>
					</div>
					<input type="hidden" name="item_no" value="{{ $row->id }}">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
					<button type="submit" class="btn btn-primary basicbtn">{{ __('Make Order') }}</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/js/form.js?v=1.0') }}"></script>
<script src="{{ asset('assets/js/admin/order_create.js') }}"></script>
@endpush	