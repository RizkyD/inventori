<?php

namespace App\Http\Controllers\Services;

use App\Models\Inventory;

class InventoryService
{
    public function store(array $data)
    {
        $inventory = Inventory::create($data);
        return Inventory::with('type')->with('room')->findOrfail($inventory->id);
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