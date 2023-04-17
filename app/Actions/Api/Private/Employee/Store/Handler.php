<?php

namespace App\Actions\Api\Private\Employee\Store;

use DB;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request)
    {
        DB::beginTransaction();
        try {
            ValidateRequest::handle($request);
            SaveData::handle($request);
            DB::commit();

            return response()->api(true, 200, [], 'Successfully store employee', '', '');
        } catch (\Exception $e) {
            DB::rollback();

            return response()->api(false, 400, [], '', $e->getMessage(), '');
        }
    }
}
