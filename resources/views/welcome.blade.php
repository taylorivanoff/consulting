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
                <p class="h2" id="subtext">I've used the proven BeSpoke™ process to upgrade existing portfolio websites for architectural firms to allure befitting clientele and win more business in 6 weeks.</p>
                <div class="text-center text-lg-left py-4 m-0">
                    <a
                        href="{{ route('contact') }}" 
                        class="btn btn-danger text-uppercase font-weight-bold badge-pill py-2 px-3"
                    >Apply For BeSpoke™</a>
                </div>
            </div>

            <div class="offset-lg-1 col-lg-4 text-center">
                <img src="{{ asset('img/headshot.jpeg') }}" alt="Photo of Taylor Ivanoff" class="rounded-circle my-2 px-4 w-100">
                <p class="h5">Taylor Ivanoff</p>
                <p class="h6">Portfolio Website Consulting Expert</p>
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

@include('components.download-guide')

@endsection
