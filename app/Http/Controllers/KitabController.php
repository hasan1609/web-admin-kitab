<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bab;
use App\Models\Kitab;

class KitabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $bab = Bab::where('id_bab', $id)->first();
        $kitab = Kitab::where('bab_id', $id)->get();
        return view('kitab.index', [
            'kitab' => $kitab,
            'bab' => $bab
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('kitab.create', [
            'bab' => Bab::findOrFail($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'soal' => 'required',
        ], [
            'soal.required' => 'Soal tidak boleh kosong',
        ]);
    
        // Simpan data ke dalam database
        try {
            Kitab::create([
                'bab_id' => $request->bab_id,
                'judul_kitab' => $request->nama_kitab,
                'soal' => $request->soal,
                'jawaban' => $request->jawaban,
            ]);
            return redirect('/kitab/' . $request->input('bab_id'))->with('success', 'Data berhasil disimpan.');

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
    public function edit($id_kitab)
    {
        return view('kitab.edit', [
            'kitab' => Kitab::findOrFail($id_kitab)->with('bab')->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'soal' => 'required',
        ], [
            'soal.required' => 'Soal tidak boleh kosong',
        ]);
    
        // Simpan data ke dalam database
        try {
            Kitab::where('id_kitab', $request->id_kitab)->update([
                'bab_id' => $request->bab_id,
                'judul_kitab' => $request->nama_kitab,
                'soal' => $request->soal,
                'jawaban' => $request->jawaban,
            ]);
            return redirect('/kitab/' . $request->input('bab_id'))->with('success', 'Data berhasil diubah.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menguabah data.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $delete =Kitab::where('id_kitab', $request->id_kitab)->first();
        $delete->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');

    }
}
