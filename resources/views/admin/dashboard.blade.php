@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($data as $models)
        @includeWhen(count($models), 'admin.datatable', [
            'models' => $models,
            'excluded' => ['updated_at']
        ])
    @endforeach

</div>  
@endsection
