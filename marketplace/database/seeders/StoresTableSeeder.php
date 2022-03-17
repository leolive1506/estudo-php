<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::all();
        // foreach($user as $user) {
        // }
        Store::factory()
            ->has(Product::factory()->count(5))
        ->count(40)->create();
    }
}
