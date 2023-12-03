@extends('base')

@section('body')
    <script>
        var renderStart = new Date().getTime();
        window.onload = () => {
            var elapsed = new Date().getTime()-renderStart;
            document.cookie = "time=" + elapsed
            location.href = '/orders/' + (Math.floor(Math.random() * 100)+1)
        }
    </script>
        <div>
            <h1>
                Szczegóły zamówienia #{{ $order->id }}
            </h1>
            <article>
                <p>
                    Użytkownik:
                    <strong>
                        <a href="/clients/{{ $client->id }}">
                            {{ $client->name }} {{ $client->surname }}
                        </a>
                    </strong>
                    , identyfikator #{{ $client->id }}
                </p>
                <p>
                    Adres:
                    <strong>
                        {{ $client->address }}
                    </strong>
                </p>
                <p>
                    Do zapłaty:
                    <strong>
                        {{ $order->sum_total }} zł
                    </strong>
                </p>
                <p>
                    Status zamówienia:
                    <strong>
                        <a href="/orders/status/{{ $order->status_id }}">
                            {{ $status->code }}
                        </a>
                    </strong>
                     - {{ $status->description }}
                </p>
            </article>
            <h1>
                Produkty
            </h1>
            @if($products === null)
                <h3>
                    Zamówienie jest puste
                </h3>
            @else
                @foreach($products as $product)
                    <article>
                        <h1>
                            <a href="/products/{{ $product->id }}">
                                {{ $product->name }}
                            </a>
                        </h1>
                    </article>
                @endforeach
            @endif
            <h3>
                <a href="/orders">
                    Powrót
                </a>
            </h3>
        </div>
    @endsection
