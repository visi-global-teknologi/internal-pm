<?php

namespace App\Actions\Api\Private\Helper\SelectTwo\DistrictByCity;

use App\Models\IndonesiaDistrict;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $cityCode)
    {
        $data = self::getData($request, $cityCode);

        return response()->api(true, 200, $data, 'Successfully get data district', '', '');
    }

    public static function getData($request, $cityCode)
    {
        $result = [];
        $districts = IndonesiaDistrict::where('city_code', $cityCode)->get();

        if ($districts->count() > 0) {
            $temp = [];
            foreach ($districts as $key => $value) {
                $temp[$key]['id'] = $value->code;
                $temp[$key]['text'] = $value->name;
            }
            $result['results'] = $temp;
        }

        return $result;
    }
}
