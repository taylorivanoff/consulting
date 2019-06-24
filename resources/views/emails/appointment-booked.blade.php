@component('mail::message')
Hi {{ $appointment->name }},

Taylor Ivanoff here.

Congratulations. You've made the first step in maximising your revenue.

Our application call will be approx. 30-45 min, and is scheduled at:

<br>

##{{ Illuminate\Support\Carbon::parse($appointment->time)->format('g:ia \o\n l, jS F, Y') }}

<br>

@component('mail::panel')
<a href="{{ $links['google'] }}">Add to Google Calendar</a>

<a href="{{ $links['yahoo'] }}">Add to Yahoo Calendar</a>

<a href="{{ $links['webOutlook'] }}">Add to Outlook</a>
@endcomponent

Thirty minutes prior to the scheduled time, you'll receive a confirmational e-mail about the call 📞

Speak to you soon.

Taylor Ivanoff, Director</p>
@endcomponent
