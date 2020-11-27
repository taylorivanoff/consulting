@component('mail::message')
Hi {{ $appointment->name }},

You will be scheduled at:

<br>

##{{ Illuminate\Support\Carbon::parse($appointment->time)->format('g:ia \o\n l, jS F, Y') }}

<br>

@component('mail::panel')
<a href="{{ $links['google'] }}">Add to Google Calendar</a>

<a href="{{ $links['yahoo'] }}">Add to Yahoo Calendar</a>

<a href="{{ $links['webOutlook'] }}">Add to Outlook</a>
@endcomponent

Thank you!
</p>
@endcomponent
