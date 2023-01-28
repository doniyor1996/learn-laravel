<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class   TestController extends Controller
{
    public function testRoute()
    {
        return $this->responseSuccess(['message' => 'ok 2']);
    }

    public function testView(Request $request)
    {
        $name = mb_convert_case($request->name ?? 'Finn', MB_CASE_TITLE);
        return view('greeting', [
            'name' => $name,
            'lastName' => 'Muxtor Ali',
        ]);
    }
}
