<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Services\ProfileService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function Index()
    {
        $user = Auth::user();

        return view('profiles.index', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $request->toArray();

        app(ProfileService::class)->update($data);
        return redirect('/profile');
    }
}