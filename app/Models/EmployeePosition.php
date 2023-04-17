<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeePosition
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $active_status
 * @property int $employee_division_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property EmployeeDivision $employee_division
 * @property Collection|Employee[] $employees
 */
class EmployeePosition extends Model
{
    protected $table = 'employee_positions';

    protected $casts = [
        'employee_division_id' => 'int',
    ];

    protected $fillable = [
        'uuid',
        'name',
        'active_status',
        'employee_division_id',
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
            $user->uuid = (string) \Str::uuid().'-employee-position-'.time();
        });
    }

    public function employee_division()
    {
        return $this->belongsTo(EmployeeDivision::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
