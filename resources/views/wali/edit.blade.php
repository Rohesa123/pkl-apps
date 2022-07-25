@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card bg-navy">
                    <div class="card-header border-bottom border-1">
                        Data Wali
                    </div>
                    <div class="card-body">
                        <form action="{{ route('wali.update', $wali->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Nama Wali</label>
                                <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ $wali->nama }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                <input type="file" class="form-control  @error('foto') is-invalid @enderror"
                                    name="foto" value="{{ $wali->nama }}">
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pilih Data Siswa</label>
                                <select name="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror"
                                    readonly>
                                    @foreach ($siswa as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == $wali->id_siswa ? 'selected' : '' }}>
                                            {{ $data->nama_siswa }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 d-flex justify-content-center">
                                <div class="d-flex justify-content-evenly w-50">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a href="{{ route('wali.index') }}"
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
