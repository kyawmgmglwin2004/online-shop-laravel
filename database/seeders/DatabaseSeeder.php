<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        //  $list = ['Computer', 'TV', 'TV', 'Keyboard', 'Mouse', 'Airpot', 'Other Accessories'];
            
        // foreach($list as $name){
        // Category::create(['name' => $name]);
        // }
        User::factory()->count(20)->create();
    
    }
}
