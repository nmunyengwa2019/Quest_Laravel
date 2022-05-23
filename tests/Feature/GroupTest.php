<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Group;
use App\Models\User;

class GroupTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * @test
     * */
    public function a_group_can_be_created()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create());
        
        $attributes = [
            'name'=>$this->faker->name,
            'description'=>$this->faker->paragraph,
            'user_id'=>1        
        ];

        $this->get('/groups/create')->assertStatus(200);


        $this->post('/groups',$attributes)->assertRedirect('/groups');
        $this->assertDatabaseHas('groups',$attributes);
        $this->get('/groups')->assertSee($attributes['name'])->assertSee($attributes['description']);
    }


    /**
     * @test
     * */
    public function a_name_is_required()
    {
        $this->actingAs(User::factory()->create());
        $attributes = [
            'name'=>'',
            'description'=>$this->faker->paragraph 
        ];

        $this->post('/groups',$attributes)->assertSessionHasErrors('name');

    }
    /**
     * @test
     * */
    public function a_description_is_required()
    {
        $this->actingAs(User::factory()->create());
        $attributes = [
            'name'=>$this->faker->name,
            'description'=>'',
            'user_id'=>1 
        ];

        $this->post('/groups',$attributes)->assertSessionHasErrors('description');

    }
    // /**
    //  * @test
    //  * */
    // public function a_user_id_is_required()
    // {

    //     //$this->withoutExceptionHandling();
    //     $this->actingAs(User::factory()->create());
    //     $attributes = [
    //         'name'=>$this->faker->name,
    //         'description'=>$this->faker->paragraph,
    //         'user_id'=>null
    //     ];

    //     $this->post('/groups',$attributes)->assertSessionHasErrors('user_id');

    // }

    /**
     * @test
     * */
    public function a_user_can_view_a_group()
    {
        $this->actingAs(User::factory()->create());
        $this->withoutExceptionHandling();
        $attributes = [
            'name'=>$this->faker->name,
            'description'=>$this->faker->paragraph,
            'user_id'=>1        
        ];
        $group= Group::factory()->create($attributes);
        $this->get($group->path())->assertSee($attributes['name'])->assertSee($attributes['description']);

    }

    /**
     * @test
     * */
    public function guests_can_not_view_groups()
    {
        //$this->withoutExceptionHandling();
        $attributes = [
            'name'=>$this->faker->name,
            'description'=>$this->faker->paragraph,
            'user_id'=>1        
        ];
        Group::factory()->create($attributes);

        $this->get('/groups')->assertStatus(302);
    }

    /**
     * @test
     * */
    public function a_group_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create());
        
        $attributes = [
            'name'=>$this->faker->name,
            'description'=>$this->faker->paragraph,
            'user_id'=>1        
        ];



        $this->post('/groups',$attributes);
        $this->assertDatabaseHas('groups',$attributes);
        $group = Group::first();
        $this->get($group->path() . '/edit')->assertStatus(200);

        
        $this->patch($group->path(),['name'=>'Jane','description'=>'Lovren'])->assertRedirect('/groups');

        $this->assertEquals('Jane',Group::first()->name);
        $this->assertEquals('Lovren',Group::first()->description);
        
    }


    /**
     * @test
     * */
    public function a_group_can_be_deleted()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create());
        $attributes = [
            'name'=>$this->faker->name,
            'description'=>$this->faker->paragraph,
            'user_id'=>1        
        ];


        $this->post('/groups',$attributes);
        //$this->assertDatabaseHas('groups',$attributes);
        $group = Group::first();
        $this->assertCount(1,Group::all());

        $this->delete($group->path())->assertRedirect('/groups');
        $this->assertCount(0,Group::all());



    }

    // /**
    //  * @test
    //  * */
    // public function a_group_name_cannot_be_duplicated()
    // {

    //    $this->withoutExceptionHandling();
    //     $this->actingAs(User::factory()->create());
        
    //     $attributes = [
    //         'name'=>'noel',
    //         'description'=>'king',
    //         'user_id'=>1        
    //     ];


    //     $this->post('/groups',$attributes)->assertRedirect('/groups');
        
    //     $attributes1 = [
    //         'name'=>'noel',
    //         'description'=>'dave',
    //         'user_id'=>1        
    //     ];


    //     $this->post('/groups',$attributes1)->assertSessionHasErrors('name');



    // }






}
