@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-dark text-light">
                    <div class="card-header mb-3">Data Siswa</div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="nis">Nis</label>
                            <input type="number" name="nis" id="nis" value="{{ $siswa->nis }}" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" value="{{ $siswa->nama_siswa }}" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="alamat">Alamat Siswa</label>
                            <textarea type="text" name="alamat_siswa" id="alamat" class="form-control" readonly>{{ $siswa->alamat_siswa }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tgl">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tgl" value="{{ $siswa->tanggal_lahir }}" class="form-control" readonly>
                        </div>

                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('siswa.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection