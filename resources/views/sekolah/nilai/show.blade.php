@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-dark text-light">
                    <div class="card-header mb-3">Data Nilai</div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="nis">Nis</label>
                            <input type="number" id="nis" name="nis" value="{{ $nilai->nis }}" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="kmp">Kode Mata Pelajaran</label>
                            <input type="text" id="kmp" name="kode_mata_pelajaran" value="{{ $nilai->kode_mata_pelajaran }}" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nilai">Nilai</label>
                            <input type="number" id="nilai" name="nilai" value="{{ $nilai->nilai }}"   class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="in">Indeks Nilai</label>
                            <input type="text" id="in" name="indeks_nilai" value="{{ $nilai->indeks_nilai }}" class="form-control" readonly>
                        </div>

                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('nilai.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection