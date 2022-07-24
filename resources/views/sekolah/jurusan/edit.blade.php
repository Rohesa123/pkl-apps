@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-dark text-light">
                    <div class="card-header mb-3">Data Nilai</div>

                    <div class="card-body bg-dark text-light">
                        <form action="{{ route('jurusan.update', $jurusan->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="kmp">Kode Mata Pelajaran</label>
                                <input type="text" id="kmp" placeholder="Masukkan Kode Mata Pelajaran" name="kode_mata_pelajaran" value="{{ $jurusan->kode_mata_pelajaran }}"
                                    class="form-control @error('kode_mata_pelajaran') is-invalid @enderror">
                                @error('kode_mata_pelajaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nmp">Nama Mata Pelajaran</label>
                                <input type="text" id="nmp" placeholder="Nama Mata Pelajaran" name="nama_mata_pelajaran" value="{{ $jurusan->nama_mata_pelajaran }}" class="form-control @error('nama_mata_pelajaran') is-invalid @enderror">
                                @error('nama_mata_pelajaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="semester">Semester</label>
                                <input type="text" id="semester" placeholder="Masukkan Semester" name="semester" value="{{ $jurusan->semester }}" class="form-control @error('semester') is-invalid @enderror">
                                @error('semester')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jurusan">Jurusan</label>
                                <select name="jurusan" id="jurusan" class="form-control form-select @error('jurusan') is-invalid @enderror">
                                    <option value="RPL" {{($jurusan->jurusan == "RPL")?"Selected":null;}}>RPL</option>
                                    <option value="TBSM" {{($jurusan->jurusan == "TBSM")?"Selected":null;}}>TBSM</option>
                                    <option value="TKRO" {{($jurusan->jurusan == "TKRO")?"Selected":null;}}>TKRO</option>
                                </select>
                                @error('jurusan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex justify-content-center">
                                <div class="d-flex justify-content-evenly w-25">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a href="{{ route('jurusan.index') }}"
                                        class="btn btn-sm btn-danger pt-2">Kembali
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection