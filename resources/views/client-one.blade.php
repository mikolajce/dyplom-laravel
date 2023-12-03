@extends ('base')

@section('body')
<div>
    <h1>
        Informacje o kliencie
    </h1>
    <article>
        <h1>
            {{ $client->name }} {{ $client->surname }}, ID #{{ $client->id }}
        </h1>
        <p>
            Adres:
            <strong>
                {{ $client->address }}
            </strong>
        </p>
        <h3>
            <a href="/clients">
                Powrót
            </a>
        </h3>
    </article>
</div>
@endsection
