<?php

namespace Lfbellante\ItalyProvinces\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Province extends Model
{
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'code',
		'name',
		'abbreviation'
	];

	/**
	 * The "booted" method of the model.
	 *
	 * @return void
	 */
	protected static function booted()
	{
		static::addGlobalScope('ordered', function (Builder $builder) {
			$builder->orderBy('name', 'ASC');
		});
	}
}