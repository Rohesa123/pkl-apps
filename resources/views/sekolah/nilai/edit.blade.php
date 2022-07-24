@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-dark text-light">
                    <div class="card-header mb-3">Data Nilai</div>

                    <div class="card-body bg-dark text-light">
                        <form action="{{ route('nilai.update', $nilai->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="nis">Nis</label>
                                <input type="number" id="nis" placeholder="Masukkan Nis" name="nis" value="{{ $nilai->nis }}"
                                    class="form-control @error('nis') is-invalid @enderror">
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kmp">Kode Mata Pelajaran</label>
                                <input type="text" id="kmp" placeholder="Masukkan Kode Mata Pelajaran" name="kode_mata_pelajaran" value="{{ $nilai->kode_mata_pelajaran }}" class="form-control @error('kode_mata_pelajaran') is-invalid @enderror">
                                @error('kode_mata_pelajaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="input_nilai">Nilai</label>
                                <input type="number" placeholder="Masukkan Nilai" name="nilai" id="input_nilai" min="0" max="100" value="{{ $nilai->nilai }}" class="form-control @error('nilai') is-invalid @enderror">
                                @error('nilai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="grade">Indeks Nilai</label>
                                <input type="text" name="indeks_nilai" value="" id="grade" readonly placeholder="Nilai Grade"
                                    class="form-control @error('indeks_nilai') is-invalid @enderror">
                            </div>
                            @error('indeks_nilai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="mb-3 d-flex justify-content-center">
                                <div class="d-flex justify-content-evenly w-25">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a href="{{ route('nilai.index') }}"
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