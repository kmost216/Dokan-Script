@if(!empty($menus))
	@php
	$mainMenus=json_decode($menus->data);
	@endphp
	@foreach ($mainMenus as $row) 
	@if (isset($row->children)) 
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="department.html" id="dropdown02" data-toggle="dropdown"
	aria-haspopup="true" aria-expanded="false">{{ $row->text }} <i class="icofont-thin-down"></i></a>

	<ul class="dropdown-menu" aria-labelledby="dropdown02">
		 @foreach($row->children as $childrens)
		 @include('lphelper::lphelper.lpmenu.child', ['childrens' => $childrens])
		
		@endforeach
	</ul>
</li>
@else

<li  class="nav-item">
	<a  class="nav-link"  href="{{ url($row->href) }}" @if(!empty($row->target)) target="{{ $row->target }}" @endif>{{ $row->text }}</a>
</li>

@endif
@endforeach
@endif
