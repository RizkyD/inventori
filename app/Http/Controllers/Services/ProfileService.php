<?php

namespace App\Http\Controllers\Services;

use Illuminate\Support\Facades\Auth;

class ProfileService
{
    public function update(array $data)
    {
        $user = auth::user();
        $user->update($data);

        return redirect('/profile');
    }
}
