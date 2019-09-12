<?php

namespace App\Http\Controllers\Services;

use App\Models\User;

class UserService
{

    public function store(array $data)
    {
        return User::create([
            'name'      => $data['name'],
            'username'  => $data['username'],
            'password'  => bcrypt($data['password']),
            'role'      => $data['role']
        ]);
    }
    /**     * Update
     */
    public function update(array $data, $id)
    {
        $user = user::find($id);
        $user->update($data);
    }

    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect('/users');
    }
}
