<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'expression'=>$this->faker->sentence,
            'topic_id'=> function(){
                return Topic::factory()->create()->id;
            }
        ];
    }
}
