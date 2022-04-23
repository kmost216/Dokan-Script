@if ($childrens)
  	<li  class="{{ $li }} @if (isset($childrens->children))  menu-item-has-children @endif" >
  			@if($icon_position=='left') <i class="flaticon-right-arrow-1"></i> @endif
  			<a @if(url()->current() == url($row->href)) class="active" @endif href="{{ url($childrens->href) }}" @if(!empty($childrens->target)) target={{ $childrens->target }} @endif>{{ $childrens->text }}</a> @if($icon_position=='right') <i class="{{ $childrens->icon }}"></i>@endif
		@if (isset($childrens->children)) 
		<ul  class="{{ $ul }}" >
			@foreach($childrens->children as $row)
			 @include('lphelper::lphelper.lpmenucustom.child', ['childrens' => $row])
			@endforeach
		</ul>	
		@endif
	</li>
@endif
