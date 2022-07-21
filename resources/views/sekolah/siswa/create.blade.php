@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-dark text-light">
                    <div class="card-header mb-3">Data Siswa</div>

                    <div class="card-body">
                        <form action="{{ route('siswa.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nis">Nis</label>
                                <input type="number" id="nis" name="nis" placeholder="Masukkan Nis"
                                    class="form-control @error('nis') is-invalid @enderror">
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" name="nama_siswa" id="nama_siswa" placeholder="Masukkan Nama"
                                    class="form-control @error('nama_siswa') is-invalid @enderror">
                                @error('nama_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="alamat">Alamat Siswa</label>
                                <textarea type="text" name="alamat_siswa" id="alamat" placeholder="Masukkan Alamat"
                                    class="form-control @error('alamat_siswa') is-invalid @enderror"></textarea>
                                @error('alamat_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tgl">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tgl" placeholder="Masukkan Tanggal Lahir"
                                    class="form-control @error('nis') is-invalid @enderror">
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection