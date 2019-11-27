@extends('layouts.app')

@section('content')
<div id="hero" class="py-4">
    <div class="container">
        <div class="row my-3">
           

            <div class="col-lg-4 text-center">
                <a target="_blank" href="https://linkedin.com/in/taylor-ivanoff/">
                    <img src="{{ asset('img/headshot.jpeg') }}" alt="Photo of Taylor Ivanoff" class="rounded-circle my-2 px-4 w-100">
                
                <p class="h5 text-dark">Taylor Ivanoff</p>
            </a>
            </div>
        </div>
    </div>
</div>

<div class="py-3">
    <div class="container">
        <div class="row companies">
            <div class="col text-center align-middle" style="padding-top: 5px;">
                <img src="{{ asset('img/canteen.png') }}" alt="CanTeen Company Logo" style="width:100px">
            </div>
            <div class="col text-center align-middle p-3">
                <img src="{{ asset('img/ltrent.png') }}" alt="LTrent Driving School Company Logo" style="width:100px">
            </div>
            <div class="col text-center align-middle" style="padding-top: 43px;">
                <img src="{{ asset('img/iofabric.png') }}" alt="ioFABRIC Company Logo" style="width:100px">
            </div>
            <div class="col text-center align-middle p-3">
                <img src="{{ asset('img/odyssey.png') }}" alt="Odyssey Traveller Company Logo" style="width:100px">
            </div>
        </div>
    </div>
</div>

{{-- @include('components.download-guide') --}}

@endsection
