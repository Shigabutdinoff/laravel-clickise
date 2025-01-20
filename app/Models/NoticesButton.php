<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NoticesButton
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $deleted_at
 *
 * @package App\Models
 */
class NoticesButton extends Model
{
	use SoftDeletes;
	protected $table = 'notices_buttons';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];
}
