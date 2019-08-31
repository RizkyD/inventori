<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    protected $fillable = ['user_id','inventory_id','qty','status','desc','returned_schedule'];

    use SoftDeletes;
    protected $dates=['delete_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
