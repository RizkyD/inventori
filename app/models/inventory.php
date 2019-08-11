<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Type;
use App\Models\Room;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    protected $fillable = ['name','description','condition','qty','id_type','id_room'];

    use SoftDeletes;
    protected $dates=['delete_at'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
