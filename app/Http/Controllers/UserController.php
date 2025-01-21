<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
    }

    public function read(int $id)
    {
        return User::find($id);
    }

    public function update(int $id)
    {
        return $this->read($id)->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
    }

    public function delete(int $id)
    {
        return $this->read($id)->delete();
    }

    public function show()
    {
        return User::all();
    }
}
