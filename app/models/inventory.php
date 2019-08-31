<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Room;
use App\Models\Borrow;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    protected $fillable = ['room_id','type_id','name','desc','qty'];

    use SoftDeletes;
    protected $dates=['delete_at'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
