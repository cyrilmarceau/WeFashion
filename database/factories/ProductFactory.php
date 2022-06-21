<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $colors = [
            "Abricot",
            "Acajou",
            "Aigue-marine",
            "Alezan (chevaux)",
            "Amande",
            "Amarante",
            "Ambre",
            "Améthyste",
            "Anthracite",
            "Aquilain (chevaux)",
            "Ardoise",
            "Argent (héraldique)",
            "Aubergine",
            "Auburn (cheveux)",
            "Aurore",
            "Avocat",
            "Azur",
            "Azur (héraldique)",
            "Baillet (chevaux, vieilli)",
            "Basané (teint)",
            "Beige ou Bureau",
            "Beurre",
            "Bis",
            "Bisque",
            "Bistre",
            "Bitume (pigment)",
            "Blanc",
            "Blanc cassé",
            "Blanc lunaire",
            "Blé",
            "Bleu",
            "Bleu acier",
            "Bleu barbeau ou bleuet",
            "Bleu canard",
            "Bleu céleste",
            "Bleu charrette",
            "Bleu ciel",
            "Bleu de cobalt (pigment)",
            "Bleu de Prusse (pigment), de Berlin ou bleu hussard",
            "Bleu électrique",
            "Bleu givré",
            "Bleu Klein",
            "Bleu Majorelle",
            "Bleu marine",
            "Bleu nuit",
            "Bleu outremer",
            "Bleu paon",
            "Bleu Persan",
            "Bleu pétrole",
            "Bleu roi ou de France"
        ];

        $randomColor = $colors[array_rand($colors, 1)];

        return [
            'name' => 'Tee-shirt ' . $randomColor,
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 1, 1),
            'category_id' => Category::find(rand(1, 2)),
            'price' => $this->faker->randomFloat(2, 1, 1500),
            'status' => $this->faker->randomElement(['on_sale', 'standard']),
            'visibility' => $this->faker->randomElement(['published', 'unpublished']),
            'reference' => $this->faker->regexify('[a-zA-Z0-9]{16}')
        ];
    }
}
