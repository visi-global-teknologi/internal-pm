<?php

namespace App\Actions\Api\Private\Helper\SelectTwo\VillageByDistrict;

use App\Models\IndonesiaVillage;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $districtCode)
    {
        $data = self::getData($request, $districtCode);

        return response()->api(true, 200, $data, 'Successfully get data village', '', '');
    }

    public static function getData($request, $districtCode)
    {
        $result = [];
        $villages = IndonesiaVillage::where('district_code', $districtCode)->get();

        if ($villages->count() > 0) {
            $temp = [];
            foreach ($villages as $key => $value) {
                $temp[$key]['id'] = $value->code;
                $temp[$key]['text'] = $value->name;
            }
            $result['results'] = $temp;
        }

        return $result;
    }
}
