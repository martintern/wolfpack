<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pack;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PackController extends Controller
{
    public function index(): Collection
    {
        return Pack::with('wolves')->get();
    }

    //TODO: validation
    public function store(Request $request): Pack
    {
        return Pack::create($request->input());
    }
}
