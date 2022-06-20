<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = ['XS', 'S', 'M', 'L', 'XL'];

        foreach ($sizes as $value) {
            Size::create([
                'size' => $value
            ]);
        }
    }
}
