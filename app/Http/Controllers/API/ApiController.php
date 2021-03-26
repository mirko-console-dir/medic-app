<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Prefix;
use App\Specialization;


class ApiController extends Controller
{
    public function users()
    {
        return response()->json([
            'success' => true,
            'data' => User::with('prefixes', 'specializations','sponsorships', 'reviews')->get(),
        ], 200);
    }

    public function prefixes()
    {
        return response()->json([
            'success' => true,
            'data' => Prefix::all(),
        ], 200);
    }
}
