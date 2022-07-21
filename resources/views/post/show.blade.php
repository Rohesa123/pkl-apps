@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary">
                    <div class="card-header mb-3">Data Posts </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{ $post->title }}" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Content</label>
                            <textarea type="text"name="content" class="form-control" readonly>{{ $post->content }}
                                </textarea>

                        </div>

                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('post.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection