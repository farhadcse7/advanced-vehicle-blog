@extends('admin.layouts.app')
@section('title', 'Post List')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Post List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Post List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Posts</h3>
                            <a class="float-right" href="{{ route('admin.blog.create') }}">Add Post +</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="postlist" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Desc</th>
                                        <th>Img</th>
                                        <th>Author</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Demo data rows -->
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->category->title }}</td>
                                            <td>{{ Str::limit($post->description, 50) }}</td>
                                            <td><img src="{{ asset('assets/images/blog/' . $post->img) }}" width="50"
                                                    height="50" alt="img"></td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.blog.show', $post->id) }}"
                                                    class="btn btn-primary btn-sm">View</a>
                                                <a href="#" class="btn btn-info btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>desc</th>
                                        <th>img</th>
                                        <th>Author</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
