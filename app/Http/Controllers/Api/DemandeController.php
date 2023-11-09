<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DemandeRequest;
use App\Http\Resources\DemandeResource;
use App\Models\Demande;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function index(){
        $demandes = Demande::all();
        $demandesResource = DemandeResource::collection($demandes);
        return response()->json($demandesResource);
    }

    public function show($id){
        $demande = Demande::findOrFail($id);
        $demandeResource = new DemandeResource($demande);
        return response()->json($demandeResource);
    }

    public function store(DemandeRequest $request){
        $validated = $request->validated();
        $demande = Demande::create($validated);
        return response()->json($demande);

    }

    public function update(DemandeRequest $request, $id){
        $demande = Demande::find($id);
        $demandeUpdated = $demande->update($request->validated());
        return response()->json($demandeUpdated);
    }

    public function delete($id){
        Demande::destroy($id);
        return response()->json(["success" => "Demande supprimée!"]);
    }
}
