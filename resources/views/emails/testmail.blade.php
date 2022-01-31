@component('mail::message')
Dear staff,

{{$details['body']}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
