<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Siswa';

        $siswa = DB::table('siswa')
        ->select('id', 'nis', 'nm_siswa', 'jns_kelamin', 'tgl_lahir', 'agama', 'nm_ayah', 'nm_ibu', 'usia', 'alamat')
        ->get();

        return view('siswa.index', compact('title', 'siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $title = 'Siswa';
        return view('siswa.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nis' => 'required',
            'nm_siswa' => 'required',
            'jns_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'nm_ayah' => 'required',
            'nm_ibu' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
        ], [
            'nis.required' => 'Nis harus diisi!',
            'nm_siswa.required' => 'Nama Siswa harus diisi!',
            'jns_kelamin.required' => 'Jenis Kelamin belum dipilih!',
            'tgl_lahir.required' => 'Tanggal Lahir belum diisi!',
            'agama.required' => 'Agama belum diisi!',
            'nm_ayah.required' => "Nama Ayah belum diisi!",
            'nm_ibu.required' => "Nama Ibu belum diisi!",
            'usia.required' => "Usia belum diisi!",
            'alamat.required' => 'Alamat belum diisi!'
        ]);


        $siswa = new Siswa();
        $siswa->nis = $request->nis;
        $siswa->nm_siswa = $request->nm_siswa;
        $siswa->jns_kelamin = $request->jns_kelamin;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->agama = $request->agama;
        $siswa->nm_ayah= $request->nm_ayah;
        $siswa->nm_ibu = $request->nm_ibu;
        $siswa->usia = $request->usia;
        $siswa->alamat = $request->alamat;


        $siswa->save();


        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Siswa';

        $siswa = Siswa::findOrFail($id);

        return view('siswa.edit', compact('title', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         // dd($request->all());

         $request->validate([
            'nis' => 'required',
            'nm_siswa' => 'required',
            'jns_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'nm_ayah' => 'required',
            'nm_ibu' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
        ], [
            'nis.required' => 'Nis harus diisi!',
            'nm_siswa.required' => 'Nama Siswa harus diisi!',
            'jns_kelamin.required' => 'Jenis Kelamin belum dipilih!',
            'tgl_lahir.required' => 'Tanggal Lahir belum diisi!',
            'agama.required' => 'Agama belum diisi!',
            'nm_ayah.required' => "Nama Ayah belum diisi!",
            'nm_ibu.required' => "Nama Ibu belum diisi!",
            'usia.required' => "Usia belum diisi!",
            'alamat.required' => 'Alamat belum diisi!'
        ]);


        $siswa = Siswa::findOrFail($id);

        $siswa->nis = $request->nis;
        $siswa->nm_siswa = $request->nm_siswa;
        $siswa->jns_kelamin = $request->jns_kelamin;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->agama = $request->agama;
        $siswa->nm_ayah= $request->nm_ayah;
        $siswa->nm_ibu = $request->nm_ibu;
        $siswa->usia = $request->usia;
        $siswa->alamat = $request->alamat;


        $siswa->save();


        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus!');
    }
}
