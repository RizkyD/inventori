<?php

namespace App\Http\Controllers\Services;

use App\Models\Room;

class RoomService
{
    public function store(array $data)
    {
        return $room = Room::create($data);
    }

    public function update(array $data, $id)
    {
        $room = Room::findOrFail($id);
        $room->update($data);
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
    }
}