@component('mail::message')
# Hello {{ $studentName }}

You have been assigned to <b>{{ $productName}}</b>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
