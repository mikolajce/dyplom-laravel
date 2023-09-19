<?php

use App\Models\{Client, Order, Product, Status};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Home page route

Route::get('/', function () {
    $num = random_int(1, Product::count());

    return view('index',[
        'product' => Product::find($num)
    ]);
});

Route::get('products', function (Product $product) {
    return view('product-all',[
        'products' => Product::all()
    ]);
});

Route::get('products/{product}', function ($id){
    return view('product-one',[
        'product' => Product::findOrFail($id)
    ]);
});

Route::get('clients', function (Client $client) {
    return view('client-all',[
        'clients' => Client::all()
    ]);
});

Route::get('clients/{client}', function ($id){
    return view('client-one',[
        'client' => Client::findOrFail($id)
    ]);
});

Route::get('orders', function (Order $order){
    return view('orders-all',[
        'orders' => Order::all()
    ]);
});

Route::get('orders/{order}', function (Order $order){
    return view('orders-status',[
        'orders' => ''
    ]);
});

Route::get('orders/status/{id}', function (Status $status){
    return view('orders-'

    );
});


