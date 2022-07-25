@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card text-light bg-navy border-secondary">
                    <div class="card-header mb-3 border-bottom border-1">Data Siswa
                        <a href="{{ route('siswa.create') }}"
                            class="btn btn-sm btn-primary" style="float: right;"><i class="bi bi-plus-square pe-2"></i>Add Data
                        </a>
                    </div>

                    <div class="card-body border-primary">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nis</th>
                                        <th>Nama Siswa</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Alamat Siswa</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($siswa as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nis }}</td>
                                            <td>{{ $data->nama_siswa }}</td>
                                            <td>{{ $data->jenis_kelamin}}</td>
                                            <td>{{ $data->agama}}</td>
                                            <td>{{ $data->alamat_siswa }}</td>
                                            <td>{{ date('d M Y' , strtotime($data->tanggal_lahir)) }}</td>
                                            <td>
                                                <form action="{{ route('siswa.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('siswa.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning overflow-hidden"><i class="bi bi-pencil-fill pe-2"></i>Edit
                                                    </a> |
                                                    <a href="{{ route('siswa.show', $data->id) }}"
                                                        class="btn btn-sm btn-outline-info"><i class="bi bi-eye-fill pe-2"></i>Show
                                                    </a> |
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Are You Sure?')"><i class="bi bi-trash pe-2"></i>Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection