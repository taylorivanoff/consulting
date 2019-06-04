@extends('layouts.app')

@section('content')
<div id="hero" class="py-lg-5">
    <div class="container">
        <div class="row">
            <div class="col my-3">
                <h1 class="display-4">
                    I help architects upgrade <br>
                    their portfolio website to  <br>
                    engage more befitting clientele.
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9 my-2">
                <p class="h2" style="font-family: 'SailecMedium';">
                    I've used the proven and guaranteed BeSpoke™ process to <br>
                     win from 200% to 500% or more prospect engagement in <br>
                     6 weeks for small-to-medium architectural firms.
                </p>
            </div>
            <div class="col-lg-6 my-2">
                <register-interest></register-interest>
            </div>
        </div>
    </div>  
</div>
@endsection
