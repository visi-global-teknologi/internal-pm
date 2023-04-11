<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IndonesiaCity
 *
 * @property int $id
 * @property string $code
 * @property string $province_code
 * @property string $name
 * @property string|null $meta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property IndonesiaProvince $indonesia_province
 * @property Collection|IndonesiaDistrict[] $indonesia_districts
 */
class IndonesiaCity extends Model
{
    protected $table = 'indonesia_cities';

    protected $fillable = [
        'code',
        'province_code',
        'name',
        'meta',
    ];

    public function indonesia_province()
    {
        return $this->belongsTo(IndonesiaProvince::class, 'province_code', 'code');
    }

    public function indonesia_districts()
    {
        return $this->hasMany(IndonesiaDistrict::class, 'city_code', 'code');
    }
}
