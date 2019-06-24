@component('mail::message')
{{ $appointment->name }},

Your application to determine whether your architectural firm is able to get the most value from this program is in 30 minutes.

We'll be able to discuss your studio, where your current results are at, where you would like them to be for your business, and a few other questions.

Afterwards, if it's determined that your business is a fit for the program, we'll be able to  go from there.

Let's chat, give me a call at {{ Illuminate\Support\Carbon::parse($appointment->time)->format('g:i a') }} ⏰

@component('mail::button', ['url' => 'tel:+61 411 346 787', 'color' => 'success'])
Call Taylor
@endcomponent

Taylor Ivanoff, Director
@endcomponent
