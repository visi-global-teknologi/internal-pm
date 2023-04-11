<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IndonesiaProvince
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $meta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|IndonesiaCity[] $indonesia_cities
 */
class IndonesiaProvince extends Model
{
    protected $table = 'indonesia_provinces';

    protected $fillable = [
        'code',
        'name',
        'meta',
    ];

    public function indonesia_cities()
    {
        return $this->hasMany(IndonesiaCity::class, 'province_code', 'code');
    }
}
