<?php

namespace App\Trait;

trait ResponApi
{
    public function success($data)
    {
        return response()->json([
            'message' => 'Berhasil Mengambil Data',
            'data' => $data
        ], 200);
    }
}
