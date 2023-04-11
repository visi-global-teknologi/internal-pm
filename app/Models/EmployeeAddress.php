<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeAddress
 *
 * @property int $id
 * @property string $uuid
 * @property string $address
 * @property string $postal_code
 * @property int $country_id
 * @property int|null $indonesia_village_id
 * @property int $employee_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Country $country
 * @property Employee $employee
 * @property IndonesiaVillage|null $indonesia_village
 */
class EmployeeAddress extends Model
{
    protected $table = 'employee_addresses';

    protected $casts = [
        'country_id' => 'int',
        'indonesia_village_id' => 'int',
        'employee_id' => 'int',
    ];

    protected $fillable = [
        'uuid',
        'address',
        'postal_code',
        'country_id',
        'indonesia_village_id',
        'employee_id',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($employee) {
            $employee->uuid = (string) \Str::uuid().'-employee-address-'.time();
        });
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function indonesia_village()
    {
        return $this->belongsTo(IndonesiaVillage::class);
    }
}
