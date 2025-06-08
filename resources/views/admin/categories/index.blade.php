@extends('admin.layouts.app')
@section('title', 'Category List')
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
                    <h1 class="m-0">Category List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Category List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    @if (session('success'))
        <div class="alert alert-success m-2">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger m-2">
            {{ session('error') }}
        </div>
    @endif

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category</h3>
                            <a class="float-right" href="{{ route('admin.category.create') }}">Create New</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="postlist" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Category Name</th>
                                        <th>Slug</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Demo data rows -->
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->title }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ $category->created_at->format('d M, Y') }}</td>
                                            <td>
                                                @can('admin.blog-category.view')
                                                    <a href="{{ route('admin.category.show', $category->id) }}"
                                                        class="btn btn-primary btn-sm">View</a>
                                                @endcan
                                                @can('admin.blog-category.edit')
                                                    <a href="{{ route('admin.category.edit', $category->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                @endcan
                                                @can('admin.blog-category.delete')
                                                    <a onclick="return confirm('Are you really sure to delete ?')"
                                                        href="{{ route('admin.category.delete', $category->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Slug</th>
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
@push('scripts')
    {{-- data table js  --}}
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#postlist');
    </script>
    {{-- data table js end  --}}
@endpush
