@extends('layouts.app')

@section('content')
<div id="hero" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 py-3">
                <h1 class="display-4">I help architects win more projects with breakthrough web platforms.</h1>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-lg-7">
                <p class="h2" id="subtext">Using the proven and guaranteed BeSpoke process, I deliver showcase web experiences for architectural firms that captivate befitting clientele and win more business.</p>
                <div class="text-center text-lg-left py-4 m-0">
                    <a
                        href="tel: +61 411 346 787" 
                        class="btn btn-danger text-uppercase font-weight-bold badge-pill py-2 px-2 px-md-3"
                    >Contact Taylor To Find Out How</a>
                </div>
            </div>

            <div class="offset-lg-1 col-lg-4 text-center">
                <img src="{{ asset('img/headshot.jpeg') }}" alt="Photo of Taylor Ivanoff" class="rounded-circle my-2 px-4 w-100">
                <p class="h5">Taylor Ivanoff</p>
                <p class="h6 m-0">Designer, Software Engineer</p>
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
