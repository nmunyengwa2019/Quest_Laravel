<?php

namespace Tests\Unit;
//use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Group;
use Tests\TestCase;

class GroupTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * */
    public function a_group_has_an_owner()
    {
        $group = Group::factory()->create();

        $this->assertInstanceOf('App\Models\User',$group->owner);
    }


    /**
     * @test
     * */

    public function a_group_has_an_path()
    {
        $group=Group::factory()->create();

        $this->assertEquals('/groups/' . $group->id,$group->path());
    }
}
