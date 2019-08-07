<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    protected $fillable = [''];

    use SoftDeletes;
    protected $dates=['delete_at'];

    public function inventory()
    {
        return $this->belongsTo(user::class);
        return $this->belongsTo(type::class);
        return $this->belongsTo(room::class);
    }
}
