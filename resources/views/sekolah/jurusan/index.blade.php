@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card text-light bg-dark border-secondary">
                    <div class="card-header mb-3">Data Jurusan
                        <a href="{{ route('jurusan.create') }}"
                            class="btn btn-sm btn-primary" style="float: right;"><i class="bi bi-plus-square pe-2"></i>Add Data
                        </a>
                    </div>

                    <div class="card-body bg-dark border-primary">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Mata Pelajaran</th>
                                        <th>Nama Mata Pelajaran</th>
                                        <th>Semester</th>
                                        <th>Jurusan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($jurusan as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kode_mata_pelajaran }}</td>
                                            <td>{{ $data->nama_mata_pelajaran }}</td>
                                            <td>{{ $data->semester }}</td>
                                            <td>{{ $data->jurusan }}</td>
                                            <td>
                                                <form action="{{ route('jurusan.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('jurusan.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning overflow-hidden"><i class="bi bi-pencil-fill pe-2"></i>Edit
                                                    </a> |
                                                    <a href="{{ route('jurusan.show', $data->id) }}"
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