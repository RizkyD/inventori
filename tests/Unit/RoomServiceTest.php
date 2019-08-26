<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Services\RoomService;

class RoomServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        //Test store
        $room = app(RoomService::class)->store([
            "name" => "DemoTest1", "desc" => "DemoTest1"
        ]);
        $this->assertDatabaseHas('rooms', [
            "name" => "DemoTest1", "desc" => "DemoTest1"
        ]);
        //Test update
        app(RoomService::class)->update([
            "name" => "DemoTest2", "desc" => "DemoTest2"
        ], $room->id);
        $this->assertDatabaseHas('rooms', [
            "name" => "DemoTest2", "desc" => "DemoTest2"
        ]);
        //test delete
        app(RoomService::class)->destroy($room->id);
        $this->assertSoftDeleted('rooms', [
            "name" => "DemoTest2", "desc" => "DemoTest2"
        ]);
    }
}
