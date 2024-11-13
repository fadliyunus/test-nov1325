<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Guru';


        $guru = DB::table('guru')
        ->join('mata_pelajaran', 'guru.mpelajaran_id', '=', 'mata_pelajaran.id')
        ->select('guru.id','guru.nip','guru.nm_guru', 'guru.jns_kelamin', 'mata_pelajaran.nm_matapelajaran', 'guru.usia', 'guru.no_telp', 'guru.alamat')
        ->get();

        // dd($guru);


        return view('guru.index', compact('title', 'guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Guru';


        $mata_pelajaran = DB::table('mata_pelajaran')->get();


        return view('guru.create', compact('title', 'mata_pelajaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'nip' => 'required',
            'nm_guru' => 'required',
            'jns_kelamin' => 'required',
            'mpelajaran_id' => 'required',
            'usia' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ], [
            'nip.required' => 'Nip harus diisi!',
            'nm_guru.required' => 'Nama Guru harus diisi!',
            'jns_kelamin.required' => 'Jenis Kelamin belum dipilih!',
            'mpelajaran_id.required' => 'Mata Pelajaran belum dipilih!',
            'usia.required' => 'Usia belum diisi!',
            'no_telp.required' => "Nomor telepon belum diisi!",
            'alamat.required' => 'Alamat belum diisi!'
        ]);


        $guru = new Guru();
        $guru->nip = $request->nip;
        $guru->nm_guru = $request->nm_guru;
        $guru->jns_kelamin = $request->jns_kelamin;
        $guru->mpelajaran_id = $request->mpelajaran_id;
        $guru->usia = $request->usia;
        $guru->no_telp = $request->no_telp;
        $guru->alamat = $request->alamat;


        $guru->save();


        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Guru';

        $guru = Guru::findOrFail($id);

        $mata_pelajaran = DB::table('mata_pelajaran')->get();

        return view('guru.edit', compact('title', 'mata_pelajaran', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required',
            'nm_guru' => 'required',
            'jns_kelamin' => 'required',
            'mpelajaran_id' => 'required',
            'usia' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ], [
            'nip.required' => 'Nip harus diisi!',
            'nm_guru.required' => 'Nama Guru harus diisi!',
            'jns_kelamin.required' => 'Jenis Kelamin belum dipilih!',
            'mpelajaran_id.required' => 'Mata Pelajaran belum dipilih!',
            'usia.required' => 'Usia belum diisi!',
            'no_telp.required' => "Nomor telepon belum diisi!",
            'alamat.required' => 'Alamat belum diisi!'
        ]);

        $guru = Guru::findOrFail($id);

        $guru->nip = $request->nip;
        $guru->nm_guru = $request->nm_guru;
        $guru->jns_kelamin = $request->jns_kelamin;
        $guru->mpelajaran_id = $request->mpelajaran_id;
        $guru->usia = $request->usia;
        $guru->no_telp = $request->no_telp;
        $guru->alamat = $request->alamat;


        $guru->save();


        return redirect()->route('guru.index')->with('success', 'Guru berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);


        $guru->delete();




        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus!');
    }
}
