<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IndonesiaDistrict
 *
 * @property int $id
 * @property string $code
 * @property string $city_code
 * @property string $name
 * @property string|null $meta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property IndonesiaCity $indonesia_city
 * @property Collection|IndonesiaVillage[] $indonesia_villages
 */
class IndonesiaDistrict extends Model
{
    protected $table = 'indonesia_districts';

    protected $fillable = [
        'code',
        'city_code',
        'name',
        'meta',
    ];

    public function indonesia_city()
    {
        return $this->belongsTo(IndonesiaCity::class, 'city_code', 'code');
    }

    public function indonesia_villages()
    {
        return $this->hasMany(IndonesiaVillage::class, 'district_code', 'code');
    }
}
