@component('mail::message')
# Hi {{$a_value->name}},

A request of amount Rs {{$a_value->amount}} has been verify by {{$a_value->}}. Please review and Approve.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

<!--@component('mail::message')
# Hi {{$a_value->name}},

A request of amount Rs {{$a_value->amount}} has been verify by {{$a_value->}}. Please review and Approve.

Thanks,<br>
{{ config('app.name') }}
@endcomponent-->

<!--Hi Satyanarain,

A request of amount Rs 5000 has been created by . Please review and Verify.

Thanks,
CSEI-->