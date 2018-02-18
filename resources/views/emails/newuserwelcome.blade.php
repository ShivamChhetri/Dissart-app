@component('mail::message')
# Welcome to _chitchat_ family

Thank you **{{$user->name}}** for joining with us.Enjoy your Journey with us.

@component('mail::button', ['url' => 'http://chitchat.dev/verified/'.$user->verifyToken])
Verify
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent
