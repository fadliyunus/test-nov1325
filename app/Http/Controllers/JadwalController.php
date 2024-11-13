<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = 'Jadwal';

        $jadwal = DB::table('jadwal')
        ->join('mata_pelajaran', 'jadwal.mpelajaran_id', '=', 'mata_pelajaran.id')
        ->join('kelas', 'jadwal.kelas_id', '=', 'kelas.id')
        ->select('jadwal.id','jadwal.hari','mata_pelajaran.nm_matapelajaran', 'kelas.nm_kelas', 'jadwal.jam')
        ->get();

        // dd($jadwal);


        return view('jadwal.index', compact('title', 'jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $title = 'Jadwal';

        $kelas = DB::table('kelas')
        ->select('id', 'nm_kelas')
        ->get();

        // dd($siswa);

        $mapel = DB::table('mata_pelajaran')
        ->select('id', 'nm_matapelajaran')
        ->get();


        return view('jadwal.create', compact('title', 'kelas', 'mapel'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'hari' => 'required',
            'jam' => 'required',
            'kelas_id' => 'required',
            'mpelajaran_id' => 'required',
        ], [
            'hari.required' => 'Hari belum diisi!',
            'jam.required' => 'Jam belum diisi',
            'kelas_id.required' => 'Kelas belum dipilih!',
            'mpelajaran_id.required' => 'Mata Pelajaran belum dipilih!',
        ]);


        $jadwal = new Jadwal();
        $jadwal->hari = $request->hari;
        $jadwal->jam = $request->jam;
        $jadwal->kelas_id = $request->kelas_id;
        $jadwal->mpelajaran_id = $request->mpelajaran_id;


        $jadwal->save();


        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
