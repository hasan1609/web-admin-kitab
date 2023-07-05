<?php

namespace App\Http\Controllers;

use App\Models\Bab;
use Illuminate\Http\Request;

class BabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $babs = Bab::withCount('kitab')->get();
        return view('bab.index', compact('babs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'bab' => 'required|numeric|unique:babs|min:1',
        ], [
            'bab.numeric' => 'Nama bab harus angka',
            'bab.unique' => 'Bab Sudah ada',
            'bab.min' => 'Bab harus lebih dari angka 0'
        ]);
    
        // Simpan data ke dalam database
        try {
            Bab::create([
                'bab' => strtoupper($request->bab)
            ]);
            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
