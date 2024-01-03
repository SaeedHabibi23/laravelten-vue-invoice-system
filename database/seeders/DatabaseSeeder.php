<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Counter::factory(1)->create();
        \App\Models\Product::factory(500)->create();
        \App\Models\Customer::factory(1)->create();
        \App\Models\Invoice::factory(20)->create();
        \App\Models\InvoiceItem::factory(20)->create();
    }
}
