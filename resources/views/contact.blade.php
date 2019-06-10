@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-lg-6 offset-lg-3">
            <h1>Contact me</h1>

            <form method="POST" action="{{ route('contact.store') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control badge-pill px-2 w-75 @error('name') is-invalid @enderror" name="name" required="required">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control badge-pill px-2 w-75 @error('email') is-invalid @enderror" name="email" placeholder="name@company.com" required="required">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control px-2 w-75 @error('message') is-invalid @enderror" id="message" rows="4" name="message" required="required"></textarea>


                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary badge-pill px-3 ">
                        {{ __('Submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
