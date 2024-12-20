<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\Makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    public function getDosensByMakul($kode_makul)
{
    $makul = Makul::where('kode_makul', $kode_makul)->with('dosens')->first();

    if ($makul) {
        return response()->json($makul->dosens);
    }

    return response()->json(['message' => 'Mata kuliah tidak ditemukan'], 404);
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
