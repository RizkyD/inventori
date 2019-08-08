<?php

namespace App\Http\Controllers\Services;

use Illuminate\Support\Facades\Auth;
use Inventory;

class InventoryService
{
    public function store(array $data)
    {
        $inventory = auth::user()->inventories()->create($data);
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