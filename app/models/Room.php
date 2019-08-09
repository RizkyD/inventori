<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory;

class Room extends Model
{
    protected $fillable = ['name_room', 'code_room', 'desc'];

    use SoftDeletes;
    protected $dates=['delete_at'];

    public function inventories()
    {
        return $this->hasMany(inventory::class);
    }
}
