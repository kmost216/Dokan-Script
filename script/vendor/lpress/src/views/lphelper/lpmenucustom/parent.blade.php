@if(!empty($menus))
@php
$mainMenus=$menus;
@endphp
@if(isset($mainMenus['name']))
@php
$name=$mainMenus['name'];
$data=$mainMenus['data'];
@endphp
 <div class="widget mb-5 mb-lg-0">
	<h4 class="text-capitalize mb-3">{{ $name }}</h4>
	<div class="divider mb-4"></div>

	<ul class="list-unstyled footer-menu lh-35">
		@foreach ($data ?? [] as $row) 
		<li><a @if(url()->current() == url($row->href)) class="active" @endif href="{{ url($row->href) }}" @if(!empty($row->target)) target="{{ $row->target }}" @endif>{{ $row->text }}</a></li>
		@endforeach
	</ul>
</div>
@endif
@endif