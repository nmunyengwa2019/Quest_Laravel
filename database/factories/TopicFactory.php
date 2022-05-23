<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Group;

use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'description'=>$this->faker->paragraph,
            'group_id'=>function (){
                return Group::factory()->create()->id;
            },
            'user_id'=>function (){
                return User::factory()->create()->id;
            },

        ];
    }
}
