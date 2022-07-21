@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-dark text-light">
                    <div class="card-header mb-3">Data Jurusan</div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="kmp">Kode Mata Pelajaran</label>
                            <input type="text" id="kmp" name="kode_mata_pelajaran" value="{{ $jurusan->kode_mata_pelajaran }}" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nmp">Nama Mata Pelajaran</label>
                            <input type="text" id="nmp" name="kode_mata_pelajaran" value="{{ $jurusan->nama_mata_pelajaran }}" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="semester">Semester</label>
                            <input type="tetx" id="semester" name="nilai" value="{{ $jurusan->semester }}"   class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" id="jurusan" name="indeks_nilai" value="{{ $jurusan->jurusan }}" class="form-control" readonly>
                        </div>

                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('jurusan.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection