@component('mail::message')
# Hi {{$verifier->name}},

A request for Rs. {{$request->amount}} has been created. Please review and Verify.

Thanks,<br>
{{Auth::user()->name}}
@endcomponent
