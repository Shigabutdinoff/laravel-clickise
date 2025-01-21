<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Notice;
use App\Models\NoticesButton;
use App\Models\Status;

class NoticeController extends Controller
{
    public function create()
    {
        Company::findOrFail(request('company_id'));
        Status::findOrFail(request('status_id'));
        NoticesButton::findOrFail(request('notices_button_id'));

        return Notice::create([
            'company_id' => request('company_id'),
            'status_id' => request('status_id'),
            'notices_button_id' => request('notices_button_id'),
            'title' => request('title'),
            'text' => request('text'),
            'url' => request('url'),
            'impression_counter' => request('impression_counter'),
            'crm' => request('crm'),
            'budget' => request('budget')
        ])
            ->load('company')
            ->load('status')
            ->load('noticesButton');
    }

    public function read(int $id)
    {
        return Notice::find($id);
    }

    public function update(int $id)
    {
        Company::findOrFail(request('user_id'));
        Status::findOrFail(request('status_id'));
        NoticesButton::findOrFail(request('status_id'));

        return $this->read($id)->update([
            'company_id' => request('company_id'),
            'status_id' => request('status_id'),
            'notices_button_id' => request('notices_button_id'),
            'title' => request('title'),
            'text' => request('text'),
            'url' => request('url'),
            'impression_counter' => request('impression_counter'),
            'crm' => request('crm'),
            'budget' => request('budget'),
        ]);
    }

    public function delete(int $id)
    {
        return $this->read($id)->delete();
    }

    public function show()
    {
        return Notice::all();
    }
}
