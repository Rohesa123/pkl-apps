<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wali;
use App\Models\Siswa;

class WaliController extends Controller
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
        $wali = Wali::with('siswa')->get();
        return view('wali.index', ['wali' => $wali]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $siswa = Siswa::all();
        return view('wali.create', compact('siswa'));
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
        $validated = $request->validate([
            'nama' => 'required',
            'id_siswa' => 'required|unique:walis',
            'foto' => 'image|max:2048'
        ]);
        $wali = new Wali();
        $wali->nama = $request->nama;
        if ($request->hasFile('foto') == true) {
            $image = $request->file('foto');
            $name = rand(1000,9999) . $image->getClientOriginalName();
            $image->move('images/wali/', $name);
            $wali->foto = $name;
        } else {
            $wali->foto = "no_image.jpg";
        }
        $wali->id_siswa = $request->id_siswa;
        $wali->save();
        return redirect()->route('wali.index')->with('succes','Data Berhasil Dibuat!');
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
        $wali = Wali::FindOrFail($id);
        return view('wali.show', compact('wali'));
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
        $wali = Wali::FindOrFail($id);
        $siswa = Siswa::all();
        return view('wali.edit', compact('wali','siswa'));
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
        $wali = Wali::FindOrFail($id);

        $validated = $request->validate([
            'nama' => 'required',
            'id_siswa' => 'required|unique:walis,id_siswa,'.$wali->id,
            'foto' => 'image|max:2048'
        ]);
        
        $wali->nama = $request->nama;
        if ($request->hasFile('foto') == true) {
            $wali->deleteImage();
            $image = $request->file('foto');
            $name = rand(1000,9999) . $image->getClientOriginalName();
            $image->move('images/wali/', $name);
            $wali->foto = $name;
        } else {
            $wali->foto = "no_image.jpg";
        }
        $wali->id_siswa = $request->id_siswa;
        $wali->save();
        return redirect()->route('wali.index')->with('succes','Data Berhasil Diedit!');
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
        $wali = Wali::FindOrFail($id);
        $wali->deleteImage();
        $wali->delete();
        return redirect()->route('wali.index')->with('succes',"Data Berhasil Dihapus!");
    }
}
