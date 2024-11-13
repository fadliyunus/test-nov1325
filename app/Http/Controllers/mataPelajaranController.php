<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mataPelajaran;
use Illuminate\Support\Facades\DB;

class mataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Mata Pelajaran';


        $mapel = DB::table('mata_pelajaran')
        ->select('id', 'nm_matapelajaran', 'jurusan')
        ->get();

        // dd(vars: $mapel);


        return view('mapel.index', compact('title', 'mapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Mata Pelajaran';


        return view('mapel.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nm_matapelajaran' => 'required',
            'jurusan' => 'required',
        ], [
            'nm_matapelajaran.required' => 'Mata Pelajaran harus diisi!',
            'jurusan.required' => 'Nama Jurusan harus diisi!',
        ]);


        $mapel = new mataPelajaran();
        $mapel->nm_matapelajaran = $request->nm_matapelajaran;
        $mapel->jurusan = $request->jurusan;


        $mapel->save();


        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(mataPelajaran $mataPelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mataPelajaran $mataPelajaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mataPelajaran $mataPelajaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mapel = mataPelajaran::findOrFail($id);


        $mapel->delete();
    }
}
