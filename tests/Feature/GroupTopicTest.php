<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Group;
use App\Models\User;
use App\Models\Topic;

class GroupTopicTest extends TestCase
{
    use RefreshDatabase,WithFaker;
    /**
     * @test
     * */
    public function a_topic_can_be_created()
    {
        
         $this->withoutExceptionHandling();
         $this->actingAs(User::factory()->create());

         $attributes_topic = [
            'name'=>$this->faker->name,
            'description'=>$this->faker->paragraph,
        ];

        $group= Group::factory()->create();

        $this->get($group->path() . '/topics/create')->assertStatus(200);
        
        

        $this->post($group->path() . '/topics',$attributes_topic)->assertRedirect($group->path() . '/topics');
        $this->assertDatabaseHas('topics',$attributes_topic);
        $this->get($group->path() . '/topics')->assertSee($attributes_topic['name'])
                                                ->assertSee($attributes_topic['description']);
    }


    /**
     * @test
     * */
    public function a_topic_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(User::factory()->create());

         $attributes_topic = [
            'name'=>$this->faker->name,
            'description'=>$this->faker->paragraph,
            'user_id'=>1,
            'group_id'=>1
        ];

        $group= Group::factory()->create();
        
        $this->post($group->path() . '/topics',$attributes_topic);
        $topic = Topic::first();

        $this->patch($group->path() .'/'.$topic->path(),['name'=>'changed', 'description'=>'Lovren']);
        // $topic->refresh();
        $this->assertEquals('changed',Topic::first()->name);
        $this->assertEquals('Lovren',Topic::first()->description);
        $this->get($group->path() .'/'.$topic->path() . '/edit')->assertStatus(200);
    }

    /**
     * @test
     * */
    public function a_topic_can_be_deleted()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create());
         $attributes = [
            'name'=>$this->faker->name,
            'description'=>$this->faker->paragraph,
            'user_id'=>1,
            'group_id'=>1
        ];

        $group= Group::factory()->create();
        $topic = Topic::factory()->create($attributes);
        $group = Group::first();

        $this->assertCount(1,Topic::all());
        $this->delete($group->path().'/'.$topic->path())->assertRedirect($group->path().'/topics');
        $this->assertCount(0,Topic::all());




    }
}
