@component('mail::message')
<p>
Thank you for registering your interest in the breakthrough BeSpoke™ program.
</p>

<p>
This program delivers phenomenal results in captivating new and qualified clientele by supercharging your existing digital portfolio.
</p>

<p>
Click below, and you'll be able to apply for a free consultation call to identify whether the program is right for your business. Available positions are limited.
</p>

@component('mail::button', ['url' => $url])
Apply for BeSpoke™
@endcomponent

<p>Kind regards,<br>
Taylor Ivanoff</p>
@endcomponent
