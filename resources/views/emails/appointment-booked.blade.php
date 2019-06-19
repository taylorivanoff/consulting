@component('mail::message')
Hi {{ $appointment->name }},

Taylor Ivanoff here. Thanks for scheduling a call with me to discuss your current portfolio website situation.

Your appointment details are as follows:
@component('mail::table')
|          |                 |
|----------| ----------------|
| Time     | {{ Illuminate\Support\Carbon::parse($appointment->time)->format('h:i A') }} | 
| Date     | {{ Illuminate\Support\Carbon::parse($appointment->time)->format('l, d M, Y') }} | 
| Duration | Approx. 30 min. | 
@endcomponent

@component('mail::panel')
<a href="{{$links['google']}}">Add to Google Calendar</a>

<a href="{{$links['yahoo']}}">Add to Yahoo Calendar</a>

<a href="{{$links['webOutlook']}}">Add to Outlook</a>
@endcomponent

Before the appointment, you will receive a final e-mail with my phone number to call at the scheduled time 📞

Speak to you soon.

<p>Kind regards,<br>
Taylor Ivanoff, Director</p>
@endcomponent
