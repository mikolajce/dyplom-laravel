@extends('base')

@section('body')
    <div>
        <h1>
            Analiza wydajności środowisk wspierających tworzenie bazodanowych aplikacji internetowych na platformie PHP
        </h1>
        <h1>
            Środowisko:
            <strong>
                <a href="http://laravel.com">
                    Laravel
                </a>
            </strong>
        </h1>
    </div>
    <div>
        <article>
            <p>
                Przykładowe testy bazy danych
            </p>
            <p>
                <a href="/products">
                    Wszystkie produkty
                </a>
            </p>
            <p>
                <strong>
                    <a href="/products/{{ $product->id }}">
                        Losowy produkt
                    </a>
                </strong>
            </p>
            <p>
                <a href="/clients">
                    Wszyscy użytkownicy
                </a>
            </p>
            <p>
                <strong>
                    <a href="/clients/{{ $clientid }}">
                        Losowy użytkownik
                    </a>
                </strong>
            </p>
            <p>
                <a href="/orders">
                    Wszystkie zamówienia
                </a>
            </p>
            <p>
                <strong>
                    <a href="/orders/{{ $orderid }}">
                        Losowe zamówienie
                    </a>
                </strong>
            </p>
            <p>
                <a href="/orders/status/2">
                    Przetwarzane zamówienia
                </a>
            </p>
            <p>
                <strong>
                    <a href="/orders/status/4">
                        Zakończone zamówienia
                    </a>
                </strong>
            </p>
        </article>
        <article>
            <h1>
                Losowy produkt
            </h1>
            <h1>
                {{ $product->name }} -
                <a href="/products/{{ $product->id }}">
                    szczegóły
                </a>
            </h1>
        </article>
    </div>
@endsection
