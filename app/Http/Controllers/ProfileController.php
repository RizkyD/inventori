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

        return view('');
    }

    public function edit()
    {
        $data = Auth::user();

        return view('');
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $request->toArray();

        app(ProfileService::class)->update($data);
        return view('');
    }
}