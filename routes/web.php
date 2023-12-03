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

    $num = random_int(1, 500);
    $cid = random_int(1, 50);
    $oid = random_int(1, 100);

    $product = Product::find($num);

    return view('index', [
        'product' => $product,
        'clientid' => $cid,
        'orderid' => $oid
    ]);
});

Route::get('products', function (Product $product) {

    $products = Product::all();

    return view('product-all', [
        'products' => $products
    ]);
});

Route::get('products/{product}', function ($id){

    $product = Product::find($id);

    return view('product-one', [
        'product' => $product
    ]);
});

Route::get('clients', function (Client $client) {

    $clients = Client::all();

    return view('client-all', [
        'clients' => $clients
    ]);
});

Route::get('clients/{client}', function ($id){

    $client = Client::find($id);

    return view('client-one', [
        'client' => $client
    ]);
});

Route::get('orders', function (Order $order){

    $orders = Order::all();

    return view('orders-all',[
        'orders' => $orders
    ]);
});

Route::get('orders/{order}', function ($id){

    // test case

    $start = microtime(true);

    {
        $order = Order::find($id);
        $cid = $order->client_id;
        $sid = $order->status_id;
        $client = Client::find($cid);
        $status = Status::find($sid);
        $products = $order->products;
    }

    $time = floor(100000*(microtime(true) - $start))/100;
    file_put_contents(__DIR__ . '/../public/laravel_dbs.txt', round($time).PHP_EOL, FILE_APPEND);
    file_put_contents(__DIR__ . '/../public/laravel_views.txt', htmlspecialchars($_COOKIE["time"]).PHP_EOL, FILE_APPEND);

    return view('orders-detail' , [
        'order' => $order,
        'client' => $client,
        'status' => $status,
        'products' => $products
    ]);
});

Route::get('orders/status/{id}', function ($id){

    $orders = Order::where('status_id', $id)->get();
    $status = Status::find($id)->code;

    return view('orders-status' , [
        'orders' => $orders,
        'status_id' => $status
    ]);
});


