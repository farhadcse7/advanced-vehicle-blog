@extends('admin.layouts.app')
@section('title', 'Post Details')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Post Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Post Details</li>
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
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $post->title }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $post->category->title }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $post->description }}</td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td>
                                        <img src="{{ asset('assets/images/blog/' . $post->img) }}" width="200"
                                            height="100" alt="img">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Author</th>
                                    <td>{{ $post->user->name ?? 'User not found' }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $post->created_at->format('d M, Y') }}</td>
                                </tr>
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
