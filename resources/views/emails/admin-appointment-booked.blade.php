@component('mail::message')
#New Appointment

##{{ Illuminate\Support\Carbon::parse($appointment->time)->format('g:ia \o\n l, jS F, Y') }}

@component('mail::table')
|          |                 |
|----------| ----------------|
| Name     | {{ $appointment->name }} | 
| Phone    | {{ $appointment->phone }} | 
| E-mail   | {{ $appointment->email }} | 
@endcomponent

@component('mail::panel')
<a href="{{$links['google']}}">Add to Google Calendar</a>

<a href="{{$links['yahoo']}}">Add to Yahoo Calendar</a>

<a href="{{$links['webOutlook']}}">Add to Outlook</a>
@endcomponent

@endcomponent
