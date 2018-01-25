@component('mail::message')
# Introduction
Hi,

Your account has been created at Indusbus. Please reset your password using below link.

@component('mail::button', ['url' => $url])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
