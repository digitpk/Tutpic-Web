@component('mail::message')
# New Chat Session
Please Click Below to join the session
@component('mail::button', ['url' => url($data['url'])])
join session
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
