
@if(Cache::has(domain_info('user_id').'google-analytics'))
@php
$google_analytics=json_decode(Cache::get(domain_info('user_id').'google-analytics'));
@endphp
{!! google_analytics($google_analytics->ga_measurement_id ?? 1234) !!}
@endif


@if(Cache::has(domain_info('user_id').'tag_manager'))
@php
$tag_manager=Cache::get(domain_info('user_id').'tag_manager');
@endphp
{!! google_tag_manager_footer($tag_manager ?? 1234) !!}
@endif
@if(file_exists('uploads/'.domain_info('user_id').'/manifest.json'))
<script type="text/javascript">
        window.onload = () => {
              'use strict';
              if ('serviceWorker' in navigator) {
                 navigator.serviceWorker.register('/sw.js?v=1.0');
               
            }
        }

</script>
@endif