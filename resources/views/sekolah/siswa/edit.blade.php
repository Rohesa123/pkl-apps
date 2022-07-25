@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-navy text-light">
                    <div class="card-header mb-3 border-bottom border-1">Data Siswa</div>

                    <div class="card-body text-light">
                        <form action="{{ route('siswa.update', $siswa->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="nis">Nis</label>
                                <input type="number" id="nis" placeholder="Masukkan Nis" name="nis" value="{{ $siswa->nis }}"
                                    class="form-control @error('nis') is-invalid @enderror">
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" name="nama_siswa" id="nama_siswa" placeholder="Masukkan Nama" value="{{ $siswa->nama_siswa }}" class="form-control @error('nama_siswa') is-invalid @enderror">
                                @error('nama_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input {{($siswa->jenis_kelamin == "Laki-laki")?'checked':null;}} class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                        type="radio" name="jenis_kelamin" value="Laki-laki" id="lk">
                                    <label class="form-check-label" for="lk">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input {{($siswa->jenis_kelamin == "Perempuan")?'checked':null;}} class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                        type="radio" name="jenis_kelamin" value="Perempuan" id="pr">
                                    <label class="form-check-label form-label" for="pr">
                                        Perempuan
                                    </label>
                                </div>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Agama</label>
                                <select class="form-select @error('agama') is-invalid @enderror" name="agama">
                                    <option value="Islam" {{($siswa->agama == 'Islam')?'selected':null;}}>Islam</option>
                                    <option value="Kristen" {{($siswa->agama == 'Kristen')?'selected':null;}}>Kristen</option>
                                    <option value="Budha" {{($siswa->agama == 'Budha')?'selected':null;}}>Budha</option>
                                    <option value="Konghucu" {{($siswa->agama == 'Konghucu')?'selected':null;}}>Konghucu</option>
                                    <option value="Katolik" {{($siswa->agama == 'Katolik')?'selected':null;}}>Katolik</option>
                                </select>
                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="alamat">Alamat Siswa</label>
                                <textarea type="text" name="alamat_siswa" id="alamat" placeholder="Masukkan Alamat" class="form-control @error('alamat_siswa') is-invalid @enderror">{{ $siswa->alamat_siswa }}</textarea>
                                @error('alamat_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tgl">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tgl" placeholder="Masukkan Tanggal Lahir" value="{{ $siswa->tanggal_lahir }}" class="form-control @error('tanggal_lahir') is-invalid @enderror">
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex justify-content-center">
                                <div class="d-flex justify-content-evenly w-50">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a href="{{ route('siswa.index') }}"
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