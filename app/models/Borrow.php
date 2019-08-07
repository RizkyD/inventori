<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Borrow extends Model
{
    protected $fillable = [''];

    use SoftDeletes;
    protected $dates=['delete_at'];

    public function borrow()
    {
        return $this->belongsTo(user::class);
    }

    
}
