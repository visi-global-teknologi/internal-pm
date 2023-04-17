<?php

namespace App\Actions\Api\Private\Helper\SelectTwo\User;

use App\Models\User;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request)
    {
        $data = self::getData($request);

        return response()->api(true, 200, $data, 'Successfully get data user', '', '');
    }

    public static function getData($request)
    {
        $result = [];

        $users = User::get();
        if ($users->count() > 0) {
            $temp = [];
            foreach ($users as $key => $value) {
                $temp[$key]['id'] = $value->id;
                $temp[$key]['name'] = $value->name;
            }
            $result['results'] = $temp;
        }

        return $result;
    }
}
