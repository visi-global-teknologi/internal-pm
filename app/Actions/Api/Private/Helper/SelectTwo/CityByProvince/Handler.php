<?php

namespace App\Actions\Api\Private\Helper\SelectTwo\CityByProvince;

use App\Models\IndonesiaCity;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $provinceCode)
    {
        $data = self::getData($request, $provinceCode);

        return response()->api(true, 200, $data, 'Successfully get data city', '', '');
    }

    public static function getData($request, $provinceCode)
    {
        $result = [];
        $cities = IndonesiaCity::where('province_code', $provinceCode)->get();

        if ($cities->count() > 0) {
            $temp = [];
            foreach ($cities as $key => $value) {
                $temp[$key]['id'] = $value->code;
                $temp[$key]['text'] = $value->name;
            }
            $result['results'] = $temp;
        }

        return $result;
    }
}
