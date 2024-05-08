<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priceRanges = [
            '500.000 - 1.000.000',
            '1000.000 - 1.999.999',
            '2000.000 - 2.999.999',
            '3000.000 - 3.999.999',
            '4000.000 - 5.999.999',
            '5000.000 - 5.999.999',
        ];

        foreach ($priceRanges as $priceRange) {
            DB::table('price_ranges')->insert([
                'price_ranges' => $priceRange,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
