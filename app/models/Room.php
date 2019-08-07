<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [''];

    use SoftDeletes;
    protected $dates=['delete_at'];

    public function inventories()
    {
        return $this->hasMany(inventory::class);
    }
}
