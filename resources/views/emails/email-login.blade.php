@component('mail::message')
<p style="text-align: center;">
Click below to login to your account.
</p>

@component('mail::button', ['url' => $url])
Login
@endcomponent

@endcomponent

