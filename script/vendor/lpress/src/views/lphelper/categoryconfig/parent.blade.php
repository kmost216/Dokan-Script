 @php
 $i=0;

 @endphp
 @foreach ($categories as $key => $category)
@php
 if (is_array($select)) {
 	
 	if (in_array($category->id, $select)) {
 		$confirmck="selected";
 	}
 	else{
 		$confirmck="";
 	}
 }
 elseif(!is_array($select)){

 	if ($category->id == $select) {
 		$confirmck="selected";
 	}
 	else{
 		$confirmck="";
 	}
 }
 else{
 	$confirmck="";
 }
	
@endphp
 <option value="{{ $category->id }}" {{ $confirmck  }} > {{ $category->name }}</option>

 @foreach ($category->childrenCategories as   $childCategory)

 @include('lphelper::lphelper.categoryconfig.child', ['child_category' => $childCategory,'select'=>$select])
 @endforeach

 @endforeach
