@if ($childrens)
	@if (isset($childrens->children)) 
	<li class="dropdown dropdown-submenu dropright">
		<a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0301" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $childrens->text }}</a>

		<ul class="dropdown-menu" aria-labelledby="dropdown0301">
			@foreach($childrens->children as $row)
			 @include('lphelper::lphelper.lpmenu.child', ['childrens' => $row])
			@endforeach
		</ul>
	</li>
	@else
	<li><a class="dropdown-item" href="{{ url($childrens->href) }}" @if(!empty($childrens->target)) target={{ $childrens->target }} @endif>{{ $childrens->text }}</a></li>
	@endif
@endif


