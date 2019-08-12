<?php

namespace App\Http\Controllers\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;
use App\Models\Type;
use App\Models\Room;


class InventoryService
{
    public function store(array $data)
    {
        $QtyCondition = array_filter($data['condition']);
        $NameCondition = key($QtyCondition);

        if (count($QtyCondition) < 2) {
            $inventory = Inventory::create([
            'name'        => $data['name'],
            'type_id'     => $data['type_id'],
            'room_id'     => $data['room_id'],
            'condition'   => $NameCondition,
            'qty'         => $QtyCondition[$NameCondition],
            'description' => $data['description']
            ]);
            return $data = Inventory::with('type')->with('room')->findOrfail($inventory->id);
        }
    }

    public function update(array $data, $id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->update($data);
    }

    public function delete($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
    }
}