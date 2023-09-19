@extends('base')

@section('body')
    <div>
        <h1>
            Lista wszystkich produktów
        </h1>
    </div>
    <div>
        @if($products === null)
            <h3>Nie znaleziono produktów o podanych kryteriach</h3>
        @else
            @foreach($products as $product)
                <article>
                    <h1>
                        <a href="/products/{{ $product->id }}">
                            {{ $product->name }}
                        </a>
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
                </article>
            @endforeach
        @endif
    </div>
@endsection
