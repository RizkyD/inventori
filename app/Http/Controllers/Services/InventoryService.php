<?php

namespace App\Http\Controllers\Services;

use App\Models\Inventory;

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

    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
    }
}