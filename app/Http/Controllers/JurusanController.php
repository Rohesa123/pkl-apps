<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
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
    
    public function index()
    {
        //
        $a = Jurusan::all();
        return view('sekolah.jurusan.index', ['jurusan'=>$a]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sekolah.jurusan.create');
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
            'kode_mata_pelajaran' => 'required|unique:jurusans',
            'nama_mata_pelajaran' => 'required',
            'semester' => 'required',
            'jurusan' => 'required'
        ]);

        $jurusan = new Jurusan();
        $jurusan->kode_mata_pelajaran = $request->kode_mata_pelajaran;
        $jurusan->nama_mata_pelajaran = $request->nama_mata_pelajaran;
        $jurusan->semester = $request->semester;
        $jurusan->jurusan = $request->jurusan;

        $jurusan->save();

        return redirect()->route('jurusan.index')->with('succes','Data Berhasil Dibuat');
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
        $jurusan = Jurusan::FindOrFail($id);
        return view('sekolah.jurusan.show', compact('jurusan'));
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
        $jurusan = Jurusan::FindOrFail($id);
        return view('sekolah.jurusan.edit', compact('jurusan'));
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
        $jurusan = Jurusan::FindOrFail($id);
        $validate = $request->validate([
            'kode_mata_pelajaran' => 'required|unique:jurusans,kode_mata_pelajaran,'.$jurusan->id,
            'nama_mata_pelajaran' => 'required',
            'semester' => 'required',
            'jurusan' => 'required'
        ]);

        $jurusan->kode_mata_pelajaran = $request->kode_mata_pelajaran;
        $jurusan->nama_mata_pelajaran = $request->nama_mata_pelajaran;
        $jurusan->semester = $request->semester;
        $jurusan->jurusan = $request->jurusan;
        $jurusan->save();

        return redirect()->route('jurusan.index')->with('succes','Data Berhasil Diedit');
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
        $jurusan = Jurusan::FindOrFail($id);
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('succes',"Data Berhasil Di Hapus!");
    }
}
