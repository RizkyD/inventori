<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Type;
use App\Models\Room;

class inventory extends Model
{
    protected $fillable = ['name', 'condition', 'desc', 'code_inv', 'qty'];

    use SoftDeletes;
    protected $dates=['delete_at'];
    
    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function type()
    {
        return $this->belongsTo(type::class);
    }

    public function room()
    {
        return $this->belongsTo(room::class);
    }
}
