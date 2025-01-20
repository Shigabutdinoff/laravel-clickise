<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Status
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $deleted_at
 *
 * @package App\Models
 */
class Status extends Model
{
	use SoftDeletes;
	protected $table = 'statuses';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];
}
