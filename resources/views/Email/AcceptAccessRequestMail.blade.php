@component('mail::message')
# You have been Accepted

Press the button bellow to register!

@component('mail::button', ['url' => 'http://127.0.0.1:8000/register/'.$mailData['token']])
Register
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
