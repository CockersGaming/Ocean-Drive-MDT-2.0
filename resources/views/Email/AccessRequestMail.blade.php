@component('mail::message')
# Your request has been sent!

High Command of will take a look and either accept or reject your application.<br><br>Until then, sit tight and if you don't hear from anyone for 7 days please message or talk to high command.
Your Request Details:
<ul>
    <li><b>Name</b>: {{$mailData['name']}}</li>
    <li><b>Email</b>: {{$mailData['email']}}</li>
    <li><b>Department</b>: {{$mailData['department']}}</li>
    <li><b>Role</b>: {{$mailData['role']}}</li>
</ul>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
