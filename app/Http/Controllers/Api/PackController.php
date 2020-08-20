<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pack;
use Illuminate\Http\Request;

class PackController extends Controller
{
    //TODO: validation
    public function store(Request $request): Pack
    {
        return Pack::create($request->input());
    }
}
