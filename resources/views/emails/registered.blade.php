@component('mail::message')
<p>
Thank you for registering your interest in the breakthrough BeSpoke™ program.
</p>

<p>
We'll use this e-mail to communicate further information to you about the process.
</p>

<p>
 BeSpoke™ delivers phenomenal results in captivating new and qualified clientele by supercharging your existing digital portfolio in 6 weeks.
</p>

<p>
Click below, and you'll be able to apply for a free consultation call to identify what the program can do for your business. Positions are limited.
</p>

@component('mail::button', [
	'url' => $url,
])
Apply now
@endcomponent

<p>Kind regards,<br>
Taylor Ivanoff</p>
@endcomponent
