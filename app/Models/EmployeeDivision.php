<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeDivision
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $active_status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|EmployeePosition[] $employee_positions
 */
class EmployeeDivision extends Model
{
    protected $table = 'employee_divisions';

    protected $fillable = [
        'uuid',
        'name',
        'active_status',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->uuid = (string) \Str::uuid().'-employee-division-'.time();
        });
    }

    public function employee_positions()
    {
        return $this->hasMany(EmployeePosition::class);
    }
}
