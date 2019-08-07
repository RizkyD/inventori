<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    protected $fillable = [''];

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
