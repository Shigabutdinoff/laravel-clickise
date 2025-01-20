<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observers\CompanyObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([CompanyObserver::class])]
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
}
