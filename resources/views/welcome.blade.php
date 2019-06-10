@extends('layouts.app')

@section('content')
<div id="hero" class="py-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 my-4">
                <p class="h1 display-4">I help architects upgrade their portfolio websites to  win more projects.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 my-2">
                <p class="h2" id="subtext">I've used the guaranteed BeSpoke™ program to help architectural studios grow their business by attracting 200% to 500% or more befitting and qualified clientele in 6 weeks.</p>
            </div>

            <div class="col-lg-8 my-1">
                <p>Register your interest below to learn more.</p>
            </div>

            <div class="col-lg-6 my-2">
                <register-interest></register-interest>
            </div>
        </div>
    </div>  
</div>
@endsection
