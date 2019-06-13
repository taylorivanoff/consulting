@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-6 offset-lg-3 justify-content-center my-4 mb-5">
        <div class="card p-4">
            <h1>Login</h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group my-2">
                    <input id="email" type="email" class="form-control badge-pill px-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@company.com">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-3">
                    <button type="submit" class="btn btn-primary badge-pill px-3 ">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
