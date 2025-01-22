<?php

namespace App\Observers;

use App\Models\Company;
use App\Models\Notice;

class NoticeObserver
{
    /**
     * Handle the Notice "created" event.
     */
    public function created(Notice $notice): void
    {
        if ($notice->status_id === 1) {
            $notice->load('company')->getRelation('company')->update(['status_id' => $notice->status_id]);
        }
    }

    /**
     * Handle the Notice "updated" event.
     */
    public function updated(Notice $notice): void
    {
        //
    }

    /**
     * Handle the Notice "deleted" event.
     */
    public function deleted(Notice $notice): void
    {
        //
    }

    /**
     * Handle the Notice "restored" event.
     */
    public function restored(Notice $notice): void
    {
        //
    }

    /**
     * Handle the Notice "force deleted" event.
     */
    public function forceDeleted(Notice $notice): void
    {
        //
    }
}
