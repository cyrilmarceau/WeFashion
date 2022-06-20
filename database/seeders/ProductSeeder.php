<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Delete all images from storage in folder name 'images'
        Storage::disk('local')->delete(Storage::allFiles('images'));

        // Create 30 product
        Product::factory()->count(15)->create()->each(function($product) {

            // Get id of random category
            $category = Category::find(rand(1, 2));

            // Associate category to product
            $product->category()->associate($category);
            $product->save();
  
            $size = Size::pluck('id')->shuffle()->slice(0, rand(1, 3))->all();
            $product->sizes()->attach($size);

            $link = Str::random(12) . '.jpg';
            $file = file_get_contents('https://picsum.photos/200');
            Storage::disk('local')->put('images/'.$link, $file);

            $product->picture()->create([
                'link' => $link
            ]);
        });
    }
}
