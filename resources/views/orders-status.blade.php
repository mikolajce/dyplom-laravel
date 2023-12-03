@extends('base')

@section('body')
<div>
    <h1>
        Lista wszystkich zamówień o statusie "{{ $status_id }}"
    </h1>
</div>
<div>
    @if($orders == null)
        <h3>Nie znaleziono zamówień o podanych kryteriach</h3>
    @else
        @foreach($orders as $order)
            <article>
                <h1>
                    <a href="/orders/{{ $order->id }}">
                        Zamówienie #{{ $order->id }}
                    </a>
                </h1>
                <p>
                    Cena:
                    <strong>
                        {{ $order->sum_total }}
                    </strong>
                </p>
            </article>
        @endforeach
    @endif
</div>
@endsection
