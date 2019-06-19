@component('mail::message')
Hi {{ $appointment->name }},

Taylor Ivanoff here. Thanks for scheduling a call with me to discuss your current portfolio website situation.

Our call will discuss your current website, your digital marketing results for your business and the common pitfalls in online portfolio marketing.

After an initial analysis, I'll provide you with an actionable part of my strategic framework BeSpoke™ on how your online portfolio website could be upgraded to go about turbo-charging your client engagement results. And we'll go from there.

Your scheduled call is at:
@component('mail::table')
|          |                 |
|----------| ----------------|
| {{ Illuminate\Support\Carbon::parse($appointment->time)->format('g:ia \o\n l jS F, Y') }}     | | 
| Duration | Approx. 30 min. | 
@endcomponent

@component('mail::panel')
<a href="{{$links['ics']}}">Add to Calendar</a>

<a href="{{$links['google']}}">Add to Google Calendar</a>

<a href="{{$links['yahoo']}}">Add to Yahoo Calendar</a>

<a href="{{$links['webOutlook']}}">Add to Outlook</a>
@endcomponent

You will receive a confirmational e-mail 30 minutes prior to the scheduled time with details about the call  📞

Speak to you soon.

<p>Kind regards,<br>
Taylor Ivanoff, Director</p>
@endcomponent
