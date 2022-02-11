@component('mail::message')
# You have been Accepted

Press the button bellow to register!

@component('mail::button', ['url' => 'https://mdt.jamescockfield.dev/register/'.$mailData['token']])
Register
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
