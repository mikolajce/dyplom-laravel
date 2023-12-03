<?php

namespace Database\Seeders;

use App\Models\{Client, Order, OrderProduct, Product, Status};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    private array $companies = [
        'Corsair',
        'Razer',
        'A4tech',
        'Cisowianka',
        'Fanex sp. z o.o.',
        'Durex',
        'Oviso',
        'Taco Corp'
    ];

    private array $descs = [
        'Zamówienie nie zostało opłacone lub sfinalizowane.',
        'Zamówienie zostało opłacone i jest przetwarzane przez system.',
        'Zamówienie jest w drodze do klienta.',
        'Zamówienie zostało opłacone i dostarczone.'
    ];

    private array $codes = [
        'Oczekujące',
        'Przetwarzane',
        'Wysłane',
        'Dostarczone'
    ];

    private float $start;

    public function run(): void
    {
        // Disabling foreign key checks, allowing seeding related tables
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->start = microtime(true);

        $this->generateStatuses();
        $this->generateProducts(500);
        $this->generateClients(50);
        $this->generateOrders(100);
        $this->generateCartItems(200);

        var_dump(microtime(true) - $this->start);

        // Enabling foreign key checks back to default settings
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function generateStatuses(): void
    {
        Status::truncate();
        for($i = 0; $i <= 3; ++$i){
            Status::factory()->create([
                'id' => $i+1,
                'code' => $this->codes[$i],
                'description' => $this->descs[$i]
            ]);
        }
        var_dump('statuses: done at '.microtime(true) - $this->start);
    }

    private function generateProducts(int $quantity = 1): void
    {
        $companies = $this->companies;
        Product::truncate();
        for($i = 0; $i < $quantity; ++$i) {
            Product::factory()->create([
                'manufacturer' => $companies[array_rand($companies)]
            ]);
        }
        var_dump('products: done at '.microtime(true) - $this->start);
    }

    private function generateClients(int $quantity = 1): void
    {
        Client::truncate();
        for($i = 0; $i < $quantity; ++$i) {
            Client::factory()->create();
        }

        $me = Client::find(random_int(1, $quantity));
        $me->name = 'Mikolaj';
        $me->surname = 'Ciesliczka';
        $me->address = 'ul. Nowa 3, Tarn. Góry';
        $me->save();

        var_dump('clients: done at '.microtime(true) - $this->start);
    }

    private function generateOrders(int $quantity = 1): void
    {
        Order::truncate();
        for($i = 0; $i < $quantity; ++$i) {
            Order::factory()->create([
                'status_id' => Status::inRandomOrder()->first()->id,
                'client_id' => Client::inRandomOrder()->first()->id,
                'sum_total' => round(random_int(0,10000) / random_int(1, 100), 2)
            ]);
        }
        var_dump('orders: done at '.microtime(true) - $this->start);
    }

    private function generateCartItems(int $quantity = 1): void
    {
        OrderProduct::truncate();
        for($i = 0; $i < $quantity; ++$i) {
            OrderProduct::factory()->create([
                'order_id' => Order::inRandomOrder()->first()->id,
                'product_id' => Product::inRandomOrder()->first()->id
            ]);
        }
        var_dump('carts: done at '.microtime(true) - $this->start);
    }

}
