@php
    $ucName = Str::plural(class_basename($models[0]));
    $lcName = strtolower(Str::plural(class_basename($models[0])));

    $attributes = array_keys($models[0]->getAttributes());
    $attributes = array_diff($attributes, $excluded);

@endphp

<div class="row">
    <div class="col">
        <p class="h1">{{$ucName}}</p>
    </div>
    <div class="col">
        <a class="btn btn-success badge-pill float-right px-2" href="/{{$lcName}}" target="blank">Download CSV</a>
    </div>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                @foreach ($attributes as $attribute)
                    @if ($loop->first)
                        <th scope="col">#</th>
                    @else
                        <th scope="col">{{ ucwords(str_replace('_', ' ', $attribute)) }}</th>
                    @endif

                    @if ($loop->last)
                        <th scope="col"></th>
                    @endif
                @endforeach
            </tr>
        </thead>

        <tbody>
            @foreach ($models as $model)
            <tr>
                @foreach ($attributes as $attribute)
                <td scope="row">{{ $model->$attribute }}</td>
                @endforeach

                <td>
                    <form action="/{{$lcName}}/{{$model->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger badge-pill">x</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $models->links() }}

</div>