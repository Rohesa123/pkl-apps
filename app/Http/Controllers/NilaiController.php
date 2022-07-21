<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indeksNilai($a) {
        if($a <= 100 && $a >= 90) {
            $b = "A";
        } elseif($a < 90 && $a >= 80) {
            $b = "B";
        } elseif($a < 80 && $a >= 70) {
            $b = "C";
        } elseif($a < 70 && $a >= 50) {
            $b = "D";
        } elseif($a < 50 && $a >= 30) {
            $b = "E";
        } else if ($a < 30 && $a >= 0) {
            $b = "F";
        } else {
            $b = "Grade Error!";
        }

        return $b;
    }

    public function index()
    {
        //
        $a = Nilai::all();
        return view('sekolah.nilai.index', ['nilai' => $a]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sekolah.nilai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'nis' => 'required|unique:nilais',
            'kode_mata_pelajaran' => 'required|unique:nilais',
            'nilai' => 'required'
        ]);

        $nilai = new Nilai();
        $nilai->nis = $request->nis;
        $nilai->kode_mata_pelajaran = $request->kode_mata_pelajaran;
        $nilai->nilai = $request->nilai;
        $nilai->indeks_nilai = $this->indeksNilai($nilai->nilai);
        
        $nilai->save();

        return redirect()->route('nilai.index')->with('succes','Data Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $nilai = Nilai::FindOrFail($id);
        return view('sekolah.nilai.show', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $nilai = Nilai::FindOrFail($id);
        return view('sekolah.nilai.edit', compact('nilai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validate = $request->validate([
            'nis' => 'required|unique:nilais',
            'kode_mata_pelajaran' => 'required|unique:nilais',
            'nilai' => 'required'
        ]);

        $nilai = Nilai::FindOrFail($id);
        $nilai->nis = $request->nis;
        $nilai->kode_mata_pelajaran = $request->kode_mata_pelajaran;
        $nilai->nilai = $request->nilai;    
        $nilai->indeks_nilai = $this->indeksNilai($nilai->nilai);

        $nilai->save();

        return redirect()->route('nilai.index')->with('succes','Data Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $nilai = Nilai::FindOrFail($id);
        $nilai->delete();
        return redirect()->route('nilai.index')->with('succes',"Data Berhasil Di Hapus");
    }
}
