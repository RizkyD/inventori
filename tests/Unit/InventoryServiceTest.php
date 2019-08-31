<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Services\RoomService;
use App\Http\Controllers\Services\TypeService;
use App\Http\Controllers\Services\InventoryService;

class InventoryServiceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        //add Room + Type
        $room = app(RoomService::class)->store([
            "name" => "Room", "desc" => "Test"
        ]);
        $type = app(TypeService::class)->store([
            "name" => "Type", "desc" => "Test"
        ]);

        //Test store
        $inventory = app(InventoryService::class)->store([
            "name" => "DemoTest1", "desc" => "DemoTest1", "qty" => 123, "room_id" => $room->id, "type_id" => $type->id
        ]);
        $this->assertDatabaseHas('Inventories', [
            "name" => "DemoTest1", "desc" => "DemoTest1", "qty" => 123, "room_id" => $room->id, "type_id" => $type->id
        ]);

        //Test update
        app(InventoryService::class)->update([
            "name" => "DemoTest2", "desc" => "DemoTest2", "qty" => 123, "room_id" => $room->id, "type_id" => $type->id
        ], $inventory->id);
        $this->assertDatabaseHas('Inventories', [
            "name" => "DemoTest2", "desc" => "DemoTest2", "qty" => 123, "room_id" => $room->id, "type_id" => $type->id
        ]);

        //test delete
        app(InventoryService::class)->destroy($inventory->id);
        $this->assertSoftDeleted('Inventories', [
            "name" => "DemoTest2", "desc" => "DemoTest2", "qty" => 123, "room_id" => $room->id, "type_id" => $type->id
        ]);
    }
}
