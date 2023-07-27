<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\CustomField;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::factory(2)->create();

        CustomField::create([
            'name' => 'name',
            'type' => 'string',
            'validation' => [
                'string', 'max:255 ', 'required',
            ],
        ]);

        CustomField::create([
            'name' => 'quantity',
            'type' => 'int',
            'validation' => [
                'numeric',
            ],
        ]);

        CustomField::create([
            'name' => 'made',
            'type' => 'date',
            'validation' => [
                'date_format:Y-m-d',
            ],
        ]);

        CustomField::create([
            'name' => 'expires',
            'type' => 'date',
            'validation' => [
                'date_format:Y-m-d',
            ],
        ]);
    }
}
