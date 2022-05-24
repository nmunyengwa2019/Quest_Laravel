<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Group;
use App\Models\Topic;
use App\Models\Question;

class TopicQuestionTest extends TestCase
{
    use RefreshDatabase,WithFaker;
    /**
     * @test
     * */
    public function a_question_can_be_created()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(User::factory()->create());
        
        $attributes = [
                'expression'=>$this->faker->sentence,
                'topic_id'=>1
        ];

        $group = Group::factory()->create();
        $topic= Topic::factory()->create();

        $this->get($group->path().'/'.$topic->path().'/questions/create')->assertStatus(200);

        $this->post($group->path().'/'.$topic->path().'/questions',$attributes);
        $this->assertDatabaseHas('questions',$attributes);
        $this->get($group->path().'/'.$topic->path().'/questions')->assertSee($attributes['expression']);
    }

    /**
     * @test
     * */
    public function a_question_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(User::factory()->create());
        
        $attributes = [
                'expression'=>$this->faker->sentence,
                'topic_id'=>1
        ];

        $group = Group::factory()->create();
        $topic= Topic::factory()->create();
        $questions = Question::factory()->create($attributes);
        $question = Question::first();


        $this->assertCount(1,Question::all());
        $this->delete($group->path().'/'.$topic->path().'/questions/'.$question->id);
        $this->assertCount(0,Question::all());

    }

    /**
     * @test
     * */
    public function a_question_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(User::factory()->create());
        
        $attributes = [
                'expression'=>$this->faker->sentence,
                'topic_id'=>1
        ];

        $group = Group::factory()->create();
        $topic= Topic::factory()->create();
        $questions = Question::factory()->create($attributes);
        $question = Question::first();
        $this->get($group->path().'/'.$topic->path().'/questions/'.$question->id)->assertStatus(200);

        $this->patch($group->path().'/'.$topic->path().'/questions/'.$question->id,['expression'=>'changed'])
                        ->assertRedirect($group->path().'/'.$topic->path().'/questions/');
        $this->assertEquals('changed',Question::first()->expression);


    }
}
