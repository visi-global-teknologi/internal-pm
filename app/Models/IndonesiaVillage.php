<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IndonesiaVillage
 *
 * @property int $id
 * @property string $code
 * @property string $district_code
 * @property string $name
 * @property string|null $meta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property IndonesiaDistrict $indonesia_district
 * @property Collection|EmployeeAddress[] $employee_addresses
 */
class IndonesiaVillage extends Model
{
    protected $table = 'indonesia_villages';

    protected $fillable = [
        'code',
        'district_code',
        'name',
        'meta',
    ];

    public function indonesia_district()
    {
        return $this->belongsTo(IndonesiaDistrict::class, 'district_code', 'code');
    }

    public function employee_addresses()
    {
        return $this->hasMany(EmployeeAddress::class);
    }
}
