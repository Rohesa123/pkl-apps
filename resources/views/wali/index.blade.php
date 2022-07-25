@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-navy">
                <div class="card-header border-bottom border-1">Data Wali
                    <a href="{{ route('wali.create') }}" class="btn btn-sm btn-primary" style="float: right">
                        <i class="bi bi-plus-square pe-2"></i>Add Data
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <th>No</th>
                                <th>Nama Wali</th>
                                <th>Foto</th>
                                <th>Nama Siswa</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($wali as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>
                                            <img src="{{ $data->image() }}" style="width: 100px; height:100px; border-radius: 5px; border: 3px solid #005db9; background: #005db9;"
                                                alt="Error 404">
                                        </td>
                                        <td>{{ $data->siswa->nama_siswa }}</td>
                                        <td>
                                            <form action="{{ route('wali.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{ route('wali.edit', $data->id) }}"
                                                    class="btn btn-sm btn-outline-warning overflow-hidden"><i class="bi bi-pencil-fill pe-2"></i>Edit
                                                </a> |
                                                <a href="{{ route('wali.show', $data->id) }}"
                                                    class="btn btn-sm btn-outline-info"><i class="bi bi-eye-fill pe-2"></i>Show
                                                </a> |
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Apakah Anda Yakin?')"><i class="bi bi-trash pe-2"></i>Delete</button>
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
@endsection
