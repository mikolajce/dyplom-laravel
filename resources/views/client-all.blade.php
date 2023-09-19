@extends('base')

@section('body')
<div>
    <h1>
        Lista wszystkich użytkowników
    </h1>
</div>
<div>
    @if($clients === null)
        <h3>Nie znaleziono uzytkowników o podanych kryteriach</h3>
    @else
        @foreach($clients as $client)
            <article>
                <h1>
                    <a href="/clients/{{ $client->id }}">
                        {{ $client->name }} {{ $client->surname }}
                    </a>
                </h1>
                <p>
                    Adres: <strong>{{ $client->address }}</strong>
                </p>
            </article>
        @endforeach
    @endif
</div>
@endsection
