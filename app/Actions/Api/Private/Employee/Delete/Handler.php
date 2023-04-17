<?php

namespace App\Actions\Api\Private\Employee\Delete;

use DB;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request->request->add([
                'employee_id' => $id,
            ]);
            ValidateRequest::handle($request);
            DeleteData::handle($request);
            DB::commit();

            return response()->api(true, 200, [], 'Successfully delete employee', '', '');
        } catch (\Exception $e) {
            DB::rollback();

            return response()->api(false, 400, [], '', $e->getMessage(), '');
        }
    }
}
