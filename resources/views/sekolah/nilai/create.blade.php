@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-dark text-light">
                    <div class="card-header mb-3">Data Nilai</div>

                    <div class="card-body">
                        <form action="{{ route('nilai.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nis">Nis</label>
                                <input type="number" name="nis" id="nis" placeholder="Masukkan Nis"
                                    class="form-control @error('nis') is-invalid @enderror">
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kmp">Kode Mata Pelajaran</label>
                                <input type="text" name="kode_mata_pelajaran" id="kmp" placeholder="Masukkan Kode Mata Pelajaran"
                                    class="form-control @error('kode_mata_pelajaran') is-invalid @enderror">
                                @error('kode_mata_pelajaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="input_nilai">Nilai</label>
                                <input type="number" name="nilai" value="" placeholder="Masukkan Nilai" id="input_nilai" min="0" max="100"
                                    class="form-control @error('nilai') is-invalid @enderror">
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