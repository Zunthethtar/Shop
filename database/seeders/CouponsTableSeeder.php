<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponsTableSeeder extends Seeder
{
    public function run()
    {
        Coupon::create([
            'code' => 'FIRST10',
            'discount_percentage' => 10,
            'valid_from' => now(),
            'valid_to' => now()->addMonth(),
        ]);

    }
}
