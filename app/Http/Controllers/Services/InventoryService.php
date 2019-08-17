<?php

namespace App\Http\Controllers\Services;

use App\Models\Inventory;
use App\Models\Room;


class InventoryService
{
    public function store(array $data)
    {
        return $inventory = Inventory::create($data);
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