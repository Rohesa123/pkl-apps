<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
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
        $a = Siswa::all();
        return view('sekolah.siswa.index' ,['siswa'=>$a]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sekolah.siswa.create');
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
            'nis' => 'required|unique:siswas',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat_siswa' => 'required',
            'tanggal_lahir' => 'required'
        ]);

        $siswa = new Siswa();
        $siswa->nis = $request->nis;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->alamat_siswa = $request->alamat_siswa;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->save();
        
        return redirect()->route('siswa.index')->with('succes', 'Data Berhasil Dibuat!');
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
        $siswa = Siswa::FindOrFail($id);
        return view('sekolah.siswa.show' , compact('siswa'));
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
        $siswa = Siswa::FindOrFail($id);
        return view('sekolah.siswa.edit' ,compact('siswa'));
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
            'nis' => 'required|unique:siswas',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat_siswa' => 'required',
            'tanggal_lahir' => 'required'
        ]);

        $siswa = Siswa::FindOrFail($id);
        $siswa->nis = $request->nis;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->alamat_siswa = $request->alamat_siswa;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->save();
        
        return redirect()->route('siswa.index')->with('succes', 'Data Berhasil Diedit!');
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
        $siswa = Siswa::FindOrFail($id);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('succes',"Data Berhasil Di Hapus");
    }
}
