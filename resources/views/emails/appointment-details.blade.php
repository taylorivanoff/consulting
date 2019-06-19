@component('mail::message')
{{ $appointment->name }},

Your call to review your firm's current portfolio website situation is in 30 minutes time.

Again, our call will discuss your current website, your digital marketing results for your business and the common pitfalls designers face in online portfolio marketing.

After, I'll provide you with an actionable part of BeSpoke™ on how to go about turbo-charging your client engagement results. And we'll go from there.

Get in touch at {{ Illuminate\Support\Carbon::parse($appointment->time)->format('g:ia') }} 📞

@component('mail::button', ['url' => 'tel:+61 411 346 787', 'color' => 'success'])
Call Taylor
@endcomponent

<p>Kind regards,<br>
Taylor Ivanoff, Director</p>
@endcomponent
