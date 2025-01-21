<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observers\NoticeObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([NoticeObserver::class])]
/**
 * Class Notice
 *
 * @property int $id
 * @property int $company_id
 * @property int $status_id
 * @property int $notices_button_id
 * @property string $title
 * @property string $text
 * @property string $url
 * @property int $impression_counter
 * @property string $crm
 * @property float $budget
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 *
 * @package App\Models
 */
class Notice extends Model
{
	use SoftDeletes;
	protected $table = 'notices';

	protected $casts = [
		'company_id' => 'int',
		'status_id' => 'int',
		'notices_button_id' => 'int',
		'impression_counter' => 'int',
		'budget' => 'float'
	];

	protected $fillable = [
		'company_id',
		'status_id',
		'notices_button_id',
		'title',
		'text',
		'url',
		'impression_counter',
		'crm',
		'budget'
	];

    protected static function booted(): void
    {
        static::addGlobalScope('withCompany', function ($query) {
            $query->with('company');
        });
        static::addGlobalScope('withStatus', function ($query) {
            $query->with('status');
        });
        static::addGlobalScope('withNoticesButton', function ($query) {
            $query->with('noticesButton');
        });
    }

    public function company(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function noticesButton(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(NoticesButton::class, 'id', 'notices_button_id');
    }
}
