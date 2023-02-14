<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivitesRequest;
use App\Http\Resources\V1\ActivitesResource;
use App\Models\Activite;
use Illuminate\Http\Request;

class ActivitesController extends Controller
{
    public function index()
    {
        return ActivitesResource::collection(Activite::all());
    }
    public function show(Activite $Activite)
    {
        return new ActivitesResource($Activite);
    }
    public function store(StoreActivitesRequest $request)
    {
        Activite::create($request->validated());
        return response()->json("Activite added");
    }
    public function update(StoreActivitesRequest $request, Activite $activite)
    {
        $activite->update($request->validated());
        return response()->json("Activite updated");
    }
    public function destroy(Activite $activite)
    {
        $activite->delete();
        return response()->json("Activite Deleted");
    }
}
