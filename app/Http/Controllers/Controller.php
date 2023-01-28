<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        User::create();
    }

    protected function responseSuccess(array $data)
    {
        return response()->json([
            'data' => $data
        ]);
    }

    protected function responseError(array $data)
    {
        return response()->json([
            'data' => $data
        ], 422);
    }
}
