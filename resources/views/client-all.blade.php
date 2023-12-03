@extends('base')

@section('body')
<div>
    <h1>
        Lista wszystkich klientów
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
                        {{ $client->name }} {{ $client->surname }}, #{{ $client->id }}
                    </a>
                </h1>
            </article>
        @endforeach
    @endif
</div>
@endsection
