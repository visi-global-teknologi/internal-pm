<?php

namespace App\Actions\Api\Private\Employee\Update;

use Storage;
use App\Models\Employee;
use Illuminate\Http\Request;

class SaveData
{
    public static function handle(Request $request)
    {
        Employee::where('uuid', $request->uuid)
                ->update($request->only(['personal_email','phone_number','gender','birthday']));

        if ($request->has('photo')) {
            $photo = $request->file('photo');
            $photoName = uniqid() .'-employee-photo' . '.' . $photo->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('employee/photo', $photo, $photoName);
            Employee::where('uuid', $request->uuid)->update([
                'photo' => $photoName
            ]);
        }
    }
}
