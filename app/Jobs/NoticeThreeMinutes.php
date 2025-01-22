<?php

namespace App\Jobs;

use AllowDynamicProperties;
use App\Models\Notice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

#[AllowDynamicProperties]
class NoticeThreeMinutes implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct($id, $status_id)
    {
        $this->id = $id;
        $this->status_id = $status_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Notice::find($this->id)->update(['status_id' => $this->status_id]);
    }
}
