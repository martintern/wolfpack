<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Wolves\StoreRequest;
use App\Http\Requests\Wolves\UpdateRequest;
use App\Models\Wolf;
use Illuminate\Database\Eloquent\Collection;

class WolvesController extends Controller
{
    //TODO: filter information to only include basic and not location info
    public function index(): Collection
    {
        return Wolf::all();
    }

    public function store(StoreRequest $request): Wolf
    {
        return Wolf::create($request->input());
    }

    //TODO: authorization
    public function destroy(Wolf $wolf): bool
    {
        return $wolf->delete();
    }

    public function update(UpdateRequest $request, Wolf $wolf): bool
    {
        return $wolf->update($request->input());
    }
}
