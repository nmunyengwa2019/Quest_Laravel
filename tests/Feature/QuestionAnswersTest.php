<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Group;
use App\Models\Topic;
use App\Models\Question;
use App\Models\Answer;

class QuestionAnswersTest extends TestCase
{
    use RefreshDatabase,WithFaker;
    /**
     * @test
     * */
    public function an_answer_can_be_created()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(User::factory()->create());
        
         $attributes_question = [
                'expression'=>$this->faker->sentence,
                'topic_id'=>1
        ];

        $group = Group::factory()->create();
        $topic = Topic::factory()->create();
        $question = Question::factory()->create($attributes_question);

        $attributes = [
                'response'=>$this->faker->sentence,
                'question_id'=>1
        ];

        $this->get($group->path().'/'.$topic->path().'/questions/'.$question->id .'/answers/create')->assertStatus(200);

        $this->post($group->path().'/'.$topic->path().'/questions/'.$question->id .'/answers',$attributes);
        $this->assertDatabaseHas('answers',$attributes);
        $this->get($group->path().'/'.$topic->path().'/questions/'.$question->id .'/answers')->assertSee($attributes['response']);

    }

    /**
     * @test
     * */
    public function an_answer_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(User::factory()->create());
         $attributes_question = [
                'expression'=>$this->faker->sentence,
                'topic_id'=>1
        ];

        $group = Group::factory()->create();
        $topic = Topic::factory()->create();
        $question = Question::factory()->create($attributes_question);



        $attributes = [
                'response'=>$this->faker->sentence,
                'question_id'=>1
        ];


        $this->post($group->path().'/'.$topic->path().'/questions/'.$question->id .'/answers',$attributes);
        $answer = Answer::first();

        $this->patch($group->path().'/'.$topic->path().'/questions/'.$question->id .'/answers/'.$answer->id,['response'=>'changed']);
        $this->assertEquals('changed',Answer::first()->response);

        $this->get($group->path().'/'.$topic->path().'/questions/'.$question->id .'/answers/'.$answer->id.'/update')->assertStatus(200);

    }

    /**
     * @test
     * */
    public function an_answer_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(User::factory()->create());
         $attributes_question = [
                'expression'=>$this->faker->sentence,
                'topic_id'=>1
        ];

        $group = Group::factory()->create();
        $topic = Topic::factory()->create();
        $question = Question::factory()->create($attributes_question);

        $attributes = [
                'response'=>$this->faker->sentence,
                'question_id'=>1
        ];

        $answers=Answer::factory()->create($attributes);
        $answer = Answer::first();

        $this->delete($group->path().'/'.$topic->path().'/questions/'.$question->id .'/answers/'.$answer->id);
        $this->assertDatabaseMissing('answers',$attributes);


}



}
