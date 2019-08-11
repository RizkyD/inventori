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
            return Inventory::create([
            'name'        => $data['name'],
            'id_type'     => $data['id_type'],
            'id_room'     => $data['id_room'],
            'condition'   => $NameCondition,
            'qty'         => $QtyCondition[$NameCondition],
            'description' => $data['description']
            ]);
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