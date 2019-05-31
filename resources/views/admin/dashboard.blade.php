@extends('layouts.app')

@section('content')
<div class="container">
    <p class="h1">Leads</p>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">E-mail address</th>
                    <th scope="col">Created at</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($leads as $lead)
                <tr>
                    <th scope="row">{{$lead->id}}</th>
                    <td>{{$lead->email}}</td>
                    <td>{{$lead->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>  
@endsection
