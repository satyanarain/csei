@component('mail::message')
# Hi {{$verifier->name}},

A request of amount Rs {{$request->amount}} has been created by {{$request->createdBy->name}}. Please review and Verify.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
