<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    protected $fillable = ['name','desc'];

    use SoftDeletes;
    protected $dates=['delete_at'];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
