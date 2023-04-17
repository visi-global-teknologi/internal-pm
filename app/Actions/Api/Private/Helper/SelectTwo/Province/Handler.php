<?php

namespace App\Actions\Api\Private\Helper\SelectTwo\Province;

use App\Models\IndonesiaProvince;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request)
    {
        $data = self::getData($request);

        return response()->api(true, 200, $data, 'Successfully get data province', '', '');
    }

    public static function getData($request)
    {
        $result = [];

        $provinces = IndonesiaProvince::get();
        if ($provinces->count() > 0) {
            $temp = [];
            $temp[0]['id'] = 0;
            $temp[0]['text'] = 'Choose A Province';
            foreach ($provinces as $key => $value) {
                $temp[$key + 1]['id'] = $value->code;
                $temp[$key + 1]['text'] = $value->name;
            }
            $result['results'] = $temp;
        }

        return $result;
    }
}
