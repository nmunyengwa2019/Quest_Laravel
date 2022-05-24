<?php

namespace Database\Factories;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'response'=>$this->faker->sentence,
            'question_id'=>function(){
                return Question::factory()->create()->id;
            }
        ];
    }
}
