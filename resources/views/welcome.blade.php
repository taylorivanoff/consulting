@extends('layouts.app')

@section('content')
<div id="hero" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 py-3">
                <h1 class="display-4">I help architects win more projects with breakthrough portfolio websites.</h1>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-lg-7">
                <div class="text-center text-lg-left py-4 m-0">
                    <a
                        href="https://calendly.com/taylorivanoff/phone-meeting"
                        target="_blank" 
                        class="btn btn-danger text-uppercase font-weight-bold badge-pill py-2 px-3"
                    >Contact To Learn More</a>
                </div>
            </div>

            <div class="offset-lg-1 col-lg-4 text-center">
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
