@component('mail::message')
#New Appointment
@component('mail::table')
|          |                 |
|----------| ----------------|
| Name     | {{ $appointment->name }} | 
| Phone    | {{ $appointment->phone }} | 
| E-mail   | {{ $appointment->email }} | 
| {{ Illuminate\Support\Carbon::parse($appointment->time)->format('g:ia \o\n l jS F, Y') }}     |  | 
@endcomponent

@component('mail::panel')
<a href="{{$links['ics']}}">Add to Calendar</a>

<a href="{{$links['google']}}">Add to Google Calendar</a>

<a href="{{$links['yahoo']}}">Add to Yahoo Calendar</a>

<a href="{{$links['webOutlook']}}">Add to Outlook</a>
@endcomponent

@endcomponent
