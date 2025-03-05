<?php

namespace Database\Factories;
use App\Models\EligibilityCriteria;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class EligibilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected  $modal=EligibilityCriteria::class;
    
    public function definition()
    {

        return [
            'name'=>$this->faker->word,
            'price'=>$this->faker->numberBetween(1000,50000),
        ];
    }
}
