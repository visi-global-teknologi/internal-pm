<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Employee
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $email
 * @property string $personal_email
 * @property Carbon $birthday
 * @property Carbon $join_date
 * @property string $photo
 * @property string $phone_number
 * @property string $employee_number
 * @property string $gender
 * @property string $active_status
 * @property int $employee_level_id
 * @property int $employee_position_id
 * @property int|null $employee_supervisor_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property EmployeeLevel $employee_level
 * @property EmployeePosition $employee_position
 * @property Employee|null $employee
 * @property Collection|Employee[] $employees
 *
 * @package App\Models
 */
class Employee extends Model
{
	protected $table = 'employees';

	protected $casts = [
		'birthday' => 'date',
		'join_date' => 'date',
		'employee_level_id' => 'int',
		'employee_position_id' => 'int',
		'employee_supervisor_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'name',
		'email',
        'personal_email',
		'birthday',
		'join_date',
		'photo',
		'employee_number',
        'phone_number',
		'gender',
		'active_status',
		'employee_level_id',
		'employee_position_id',
		'employee_supervisor_id'
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
            $employee->uuid = (string) \Str::uuid() . '-employee-' . time();
        });
    }

	public function employee_level()
	{
		return $this->belongsTo(EmployeeLevel::class);
	}

	public function employee_position()
	{
		return $this->belongsTo(EmployeePosition::class);
	}

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employee_supervisor_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function employees()
	{
		return $this->hasMany(Employee::class, 'employee_supervisor_id');
	}
}
