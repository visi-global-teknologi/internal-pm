<?php

namespace App\Actions\Api\Private\Helper\SelectTwo\CountryWithoutIndonesia;

use App\Models\Country;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request)
    {
        $data = self::getData($request);

        return response()->api(true, 200, $data, 'Successfully get data company', '', '');
    }

    public static function getData($request)
    {
        $result = [];
        $countries = Country::whereNotIn('Name', config('pm.countries_not_included'))->get();

        if ($countries->count() > 0) {
            $temp = [];
            foreach ($countries as $key => $value) {
                $temp[$key]['id'] = $value->id;
                $temp[$key]['text'] = $value->name;
            }
            $result['results'] = $temp;
        }

        return $result;
    }
}
