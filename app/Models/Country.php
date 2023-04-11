<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|EmployeeAddress[] $employee_addresses
 */
class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = [
        'name',
    ];

    public function employee_addresses()
    {
        return $this->hasMany(EmployeeAddress::class);
    }
}
