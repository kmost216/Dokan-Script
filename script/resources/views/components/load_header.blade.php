
@if(Cache::has(domain_info('user_id').'tag_manager'))
@php
$tag_manager=Cache::get(domain_info('user_id').'tag_manager');
@endphp
{!! google_tag_manager_header($tag_manager ?? 1234) !!}
@endif

@if(Cache::has(domain_info('user_id').'fb_pixel'))
@php
$facebook_pixel=Cache::get(domain_info('user_id').'fb_pixel');
@endphp
{!! facebook_pixel($fb_pixel ?? 1234) !!}
@endif
@if(file_exists('uploads/'.domain_info('user_id').'/manifest.json'))
<link rel="manifest"  href="{{ asset('uploads/'.domain_info('user_id').'/manifest.json') }}">
@endif