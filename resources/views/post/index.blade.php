@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-dark text-light">
                    <div class="card-header mb-3">Data Post
                        <a href="{{ route('post.create') }}"
                            class="btn btn-sm btn-primary" style="float: right;"><i class="bi bi-plus-square pe-2"></i>Add Data
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle text-light" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($post as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->content }}</td>
                                            <td>
                                                <form action="{{ route('post.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('post.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning overflow-hidden"><i class="bi bi-pencil-fill pe-2"></i>Edit
                                                    </a> |
                                                    <a href="{{ route('post.show', $data->id) }}"
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