<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CheckPasswordController extends Controller
{
    public function submit(Request $request) {
        if ($request['password'] === 'salderisopressarea') {
            session(['pressarea' => 'salderisopress']);
            return response()->json('success');
        }

        else {
            return response()->json('failed');
        }
    }
}
