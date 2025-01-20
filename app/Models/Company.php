<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observers\CompanyObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([CompanyObserver::class])]
/**
 * Class Company
 *
 * @property int $id
 * @property int $user_id
 * @property int $status_id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 *
 * @package App\Models
 */
class Company extends Model
{
	use SoftDeletes;
	protected $table = 'companies';

	protected $casts = [
		'user_id' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'status_id',
		'name'
	];
}
