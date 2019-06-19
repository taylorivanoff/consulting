@component('mail::message')
#New Appointment
@component('mail::table')
|          |                 |
|----------| ----------------|
| Name     | {{ $appointment->name }} | 
| Phone    | {{ $appointment->phone }} | 
| E-mail   | {{ $appointment->email }} | 
| Time     | {{ Illuminate\Support\Carbon::parse($appointment->time)->format('g:i A') }} | 
| Date     | {{ Illuminate\Support\Carbon::parse($appointment->time)->format('l, d M, Y') }} | 
| Duration | Approx. 30 min. | 
@endcomponent

@component('mail::panel')
<a href="{{$links['google']}}">Add to Google Calendar</a>

<a href="{{$links['yahoo']}}">Add to Yahoo Calendar</a>

<a href="{{$links['webOutlook']}}">Add to Outlook</a>
@endcomponent

@endcomponent
