@extends('base')

@section('body')
<div>
    <h1>
        Produkt
    </h1>
    <article>
        <h1>
            {{ $product->name }}
        </h1>
        <p>
            Producent:
            <strong>
                {{ $product->manufacturer }}
            </strong>
        </p>
        <p>
            Cena: {{ $product->price }} zł
        </p>
        <h3>
            <a href="/products">
                Powrót
            </a>
        </h3>
    </article>
</div>
@endsection
