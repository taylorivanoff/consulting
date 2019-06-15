@extends('layouts.app')

@section('content')

<div id="hero" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 my-2">
                <h1 class="display-4">I help architects upgrade their portfolio websites to  win more projects.</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <p class="h2 my-4" id="subtext">I've used the guaranteed BeSpoke™ process to help architectural studios grow their business by attracting 200% to 500% or more befitting and qualified clientele in 6 weeks.</p>

                <div class="text-center text-lg-left pt-2 m-0">
                    <a
                        href="{{ route('contacts.index') }}" 
                        class="btn btn-danger text-uppercase font-weight-bold badge-pill py-2 px-3"
                    >Contact Taylor To Find Out How</a>
                </div>
            </div>

            <div class="offset-lg-1 col-lg-4 pt-3 text-center">
                <img src="{{ asset('img/headshot.jpeg') }}" alt="Photo of Taylor Ivanoff" class="rounded-circle my-2 px-4 w-100">
                <p class="h5">Taylor Ivanoff</p>
                <p class="h6">Portfolio Website Consulting Expert</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-light py-1">
    <div class="container">
        <div class="row">
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

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h1>BeSpoke™ Program For Architects</h1>
                
                <div class="py-2">
                    <p>Join the premier program for business owners to attract 200% to 500% or more befitting and qualified clientele for their studio in 6 weeks.</p>
                
                    <p>This program is for architectural designers that want to refine their digital marketing and turbo-charge their online portolio to consistently attract ideal clientele and communicate your high-value creative differentiation in the projects you do.</p>
                </div>
            </div>

            <div class="offset-lg-1 col-lg-6 pt-lg-5">
                <img src="{{ asset('img/suburbs.svg' )}}" class="w-100" alt="Architectural Houses">
            </div>
        </div>
    </div>
</div>
@endsection
