<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSdaRequest;
use App\Http\Resources\V1\SdaResource;
use App\Models\Sda;
use Illuminate\Http\Request;

class SdaController extends Controller
{
    public function index()
    {
        return SdaResource::collection(Sda::all()->sortBy("number"));
    }
    public function show(Sda $sda)
    {
        return new SdaResource($sda);
    }
    public function store(StoreSdaRequest $request)
    {
        Sda::create($request->validated());
        return response()->json("Sda added");
    }
    public function update(StoreSdaRequest $request, Sda $sda)
    {
        $sda->update($request->validated());
        return response()->json("Sda updated");
    }
    public function destroy(Sda $sda)
    {
        $sda->delete();
        return response()->json("Sda Deleted");
    }
}
