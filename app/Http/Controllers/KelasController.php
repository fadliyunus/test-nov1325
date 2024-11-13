<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = 'Kelas';

        $kelas = DB::table('kelas')
        ->join('siswa', 'kelas.siswa_id', '=', 'siswa.id')
        ->join('guru', 'kelas.guru_id', '=', 'guru.id')
        ->select('siswa.id', 'nm_kelas', 'siswa.nm_siswa', 'guru.nm_guru')
        ->get();

        // dd($kelas);

        return view('kelas.index', compact('title', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Kelas';


        $siswa = DB::table('siswa')
        ->select('id', 'nm_siswa')
        ->get();
        $guru = DB::table('guru')
        ->select('id', 'nm_guru')
        ->get();

        // dd($siswa);

        return view('kelas.create', compact('title', 'siswa', 'guru'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nm_kelas' => 'required',
            'siswa_id' => 'required',
            'guru_id' => 'required',
        ], [
            'nm_kelas.required' => 'Nama Kelas harus diisi!',
            'siswa_id.required' => 'Siswa belum dipilih!',
            'guru_id.required' => 'Guru belum dipilih!',
        ]);


        $kelas = new Kelas();
        $kelas->nm_kelas = $request->nm_kelas;
        $kelas->siswa_id = $request->siswa_id;
        $kelas->guru_id = $request->guru_id;


        $kelas->save();


        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
