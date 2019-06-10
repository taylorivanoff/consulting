@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-lg-6 offset-lg-3">
            <h1>
                @if(auth()->user()->name)
                    Hi {{auth()->user()->name}},
                @else
                    Hi,
                @endisset
            </h1>
            <br>
            <h2>Your profile</h2>

            <form method="POST" action="{{ route('user.profile.update') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control badge-pill px-2 w-75 @error('name') is-invalid @enderror" name="name" value="{{$user->name}}">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control badge-pill px-2 w-75 @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" placeholder="name@company.com" disabled>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary badge-pill px-3 ">
                        {{ __('Save changes') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
