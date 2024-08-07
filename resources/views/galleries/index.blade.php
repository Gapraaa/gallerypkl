@extends('main')

@section('title', 'list articles')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>gallery</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="">gallery</a></li>
                        <li class="active">list</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>list articles</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('galleries.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>add
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-border">

                        <thead>
                            <tr>
                                <th>foto</th>
                                <th>judul</th>
                                <th>deskripsi</th>
                                <th>tanggal dibuat</th>
                                <th>function</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $gallery)
                                <tr >
                                    <td style="width: 20%;"><img src="{{ asset('storage/' . $gallery->image_path) }}" class="card-img-top"
                                            alt="{{ $gallery->title }}"></td>
                                    <td>{{ $gallery->title }}</td>
                                    <td>{{ $gallery->description }}</td>
                                    <td>{{ $gallery->date ? $gallery->date->format('Y-m-d') : '' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('galleries.edit', $gallery->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('galleries.show', $gallery->id) }}" class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('galleries.destroy', $gallery->id) }}" method="post"
                                            class="d-inline" onsubmit="return confirm('yakin akan menghapus data?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                </div>
            </div>
        </div>
    @endsection
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
