<?php

namespace App\Http\Controllers;

use App\Jobs\NoticeThreeMinutes;
use App\Models\Company;
use App\Models\Notice;
use App\Models\NoticesButton;
use App\Models\Status;
use Carbon\Carbon;

class NoticeController extends Controller
{
    public function create()
    {
        Company::findOrFail(request('company_id'));
        Status::findOrFail(request('status_id'));
        NoticesButton::findOrFail(request('notices_button_id'));

        $status_id = request('status_id');
        $budget = request('budget');

        if ($budget <= 0) {
            $status_id = 2;
            $budget = 0;
        }

        return Notice::create([
            'company_id' => request('company_id'),
            'status_id' => $status_id,
            'notices_button_id' => request('notices_button_id'),
            'title' => request('title'),
            'text' => request('text'),
            'url' => request('url'),
            'impression_counter' => request('impression_counter'),
            'crm' => request('crm'),
            'budget' => $budget
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
        Company::findOrFail(request('company_id'));
        Status::findOrFail(request('status_id'));
        NoticesButton::findOrFail(request('notices_button_id'));

        $notice = $this->read($id);

        $status_id = request('status_id');
        $budget = request('budget');

        if ($notice->budget == 0 && $budget > 0) {
            $status_id = 1;
        } elseif ($budget <= 0) {
            $status_id = 2;
            $budget = 0;
        } elseif($notice->budget !== request('text')) {
            NoticeThreeMinutes::dispatch($id, $status_id)->delay(Carbon::now()->addMinutes(3));
            $status_id = 2;
        }

        return $notice->update([
            'company_id' => request('company_id'),
            'status_id' => $status_id,
            'notices_button_id' => request('notices_button_id'),
            'title' => request('title'),
            'text' => request('text'),
            'url' => request('url'),
            'impression_counter' => request('impression_counter'),
            'crm' => request('crm'),
            'budget' => $budget,
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
