<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Services\TypeService;

class TypeServiceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        //Test store
        $type = app(TypeService::class)->store([
            "name" => "DemoTest1", "desc" => "DemoTest1"
        ]);
        $this->assertDatabaseHas('types', [
            "name" => "DemoTest1", "desc" => "DemoTest1"
        ]);
        //Test update
        app(TypeService::class)->update([
            "name" => "DemoTest2", "desc" => "DemoTest2"
        ], $type->id);
        $this->assertDatabaseHas('types', [
            "name" => "DemoTest2", "desc" => "DemoTest2"
        ]);
        //test delete
        app(TypeService::class)->destroy($type->id);
        $this->assertSoftDeleted('types', [
            "name" => "DemoTest2", "desc" => "DemoTest2"
        ]);
    }
}
