@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card bg-navy">
                    <div class="card-header border-bottom border-1">
                        Data Wali
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Wali</label>
                            <input type="text" class="form-control" name="nama" value="{{ $wali->nama }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto Wali</label>
                            @if (isset($wali) && $wali->foto)
                                <p>
                                    @if ($wali->foto && file_exists(public_path('images/wali/'.$wali->foto)))
                                    <img src="{{ asset('images/wali/' . $wali->foto) }}"
                                        class="img-rounded img-responsive" style="width: 75px; height:75px;"
                                        alt="">
                                    @else
                                    <img src="{{ asset('images/' . $wali->foto) }}"
                                        class="img-rounded img-responsive" style="width: 75px; height:75px;"
                                        alt="">
                                    @endif
                                </p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama" value="{{ $wali->siswa->nama_siswa }}"
                                readonly>

                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('wali.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
