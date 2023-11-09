<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Demande;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Demande::factory(10)->create();

        Category::factory(5)->create()->each(function ($categorie){
            Product::factory(10)->create([
                'category_id' => $categorie->id
            ]);
        });

        Order::factory(5)->create();

       $orders = Order::all();
       $orders->each(function ($order){
           $order->products()->saveMany(Product::all()->random(5));
       });


        // $product->orders()->attach(Order::find(1)->id);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
