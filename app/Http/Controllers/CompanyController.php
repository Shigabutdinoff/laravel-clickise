<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Status;
use App\Models\User;

class CompanyController extends Controller
{
    public function create()
    {
        User::findOrFail(request('user_id'));
        Status::findOrFail(request('status_id'));

        return Company::create([
            'user_id' => request('user_id'),
            'status_id' => request('status_id'),
            'name' => request('name'),
        ])
            ->load('user')
            ->load('status');
    }

    public function read(int $id)
    {
        return Company::find($id);
    }

    public function update(int $id)
    {
        User::findOrFail(request('user_id'));
        Status::findOrFail(request('status_id'));

        return $this->read($id)->update([
            'user_id' => request('user_id'),
            'status_id' => request('status_id'),
            'name' => request('name'),
        ]);
    }

    public function delete(int $id)
    {
        return $this->read($id)->delete();
    }

    public function show()
    {
        return Company::all();
    }
}
