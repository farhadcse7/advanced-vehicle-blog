@extends('admin.layouts.app')
@section('title', 'Post List')
@push('css')
    {{-- data table css  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
@endpush
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
                        <!-- /.content-header -->
                        @if (session('success'))
                            <div class="alert alert-success m-2">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-3">
                                    <select class="form-control" name="status" id="status">
                                        <option disabled>Select Option</option>
                                        <option value="" {{ request('status') === null ? 'selected' : '' }}>All Post
                                        </option>
                                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Draft
                                            Post</option>
                                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Published
                                            Post</option>
                                    </select>
                                </div>
                            </div>
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
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Demo data rows -->
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->category->title ?? 'N/A' }}</td>
                                            <td>{!! Str::limit($post->description, 50) !!}</td>
                                            <td><img src="{{ asset('assets/images/blog/' . $post->img) }}" width="50"
                                                    height="50" alt="img"></td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->created_at->format('d M, Y') }}</td>
                                            <td class="{{ $post->status == 1 ? 'text-success' : 'text-danger' }}">
                                                {{ $post->status == 1 ? 'Published' : 'Draft' }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.blog.show', $post->id) }}"
                                                    class="btn btn-primary btn-sm">View</a>
                                                <a href="{{ route('admin.blog.edit', $post->id) }}"
                                                    class="btn btn-info btn-sm">Edit</a>
                                                <a onclick="return confirm('Are you really sure to delete ?')"
                                                    href="{{ route('admin.blog.delete', $post->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>

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
                                        <th>Status</th>
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
@push('scripts')
    {{-- data table js  --}}
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#postlist');
    </script>
    {{-- data table js end  --}}

    {{-- Filtering script by status  --}}
    <script>
        $(document).ready(function() {
            $('#status').on('change', function() {
                var status = $(this).val();
                var url = new URL(window.location.href); // Get the current URL

                if (status !== "") {
                    url.searchParams.set('status', status); // Set the status parameter
                } else {
                    url.searchParams.delete(
                        'status'); // Remove the status parameter if "All Post" is selected
                }

                // Reload the page with the new URL
                window.location.href = url.toString();
            });
        });
    </script>
    {{-- Filtering script by status  end --}}
@endpush
