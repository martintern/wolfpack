<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wolf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class WolvesController extends Controller
{
    public function index(): Collection
    {
        return Wolf::all();
    }

    //TODO: validation
    public function store(Request $request): Wolf
    {
        return Wolf::create($request->input());
    }

    //TODO: authorization
    public function destroy(Wolf $wolf): bool
    {
        return $wolf->delete();
    }
}
