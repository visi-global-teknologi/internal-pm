<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserActivity
 *
 * @property int $id
 * @property string $uuid
 * @property Carbon $date_time
 * @property string $ip_address
 * @property string $user_agent
 * @property string $module_name
 * @property string $activity
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property User $user
 */
class UserActivity extends Model
{
    protected $table = 'user_activities';

    protected $casts = [
        'date_time' => 'datetime',
        'user_id' => 'int',
    ];

    protected $fillable = [
        'uuid',
        'date_time',
        'ip_address',
        'user_agent',
        'module_name',
        'activity',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
