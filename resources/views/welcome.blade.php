@extends('layouts.app')

@section('content')
<div id="hero" class="py-lg-5">
    <div class="container">
        <div class="row">
            <div class="col my-3">
                <h1 class="display-4">
                    I help architects develop<br>
                    captivating portfolio websites to<br>
                    attract profitable and befitting clientele.<br>
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9 my-2">
                <p class="h2" style="font-family: 'SailecMedium';">
                    Register your interest for the BeSpoke™ program to upgrade your  stagnant website and win up to 200% to 500% or more projects through a uniquely positioned portfolio-based website that successfully conveys the essence of your architectural vision.
                </p>
            </div>
            <div class="col-lg-6 my-2">
                <register-interest></register-interest>
            </div>
        </div>
    </div>  
</div>

@endsection
