@extends('admin.layouts.app')
@section('title', 'Admin Users List')
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
                    <h1 class="m-0">Admin Users List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Admin Users List</li>
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
                            <h3 class="card-title">Admin Users</h3>
                            <a class="float-right" href="{{ route('admin.user.create') }}">Create New</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="userlist" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Avatar</th>
                                        <th>Role</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Demo data rows -->
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td><img src="{{ asset('assets/images/avatar/' . $user->img) }}" width="50"
                                                    height="50" alt="img"></td>
                                            {{-- <td>{{ $user->role_id }}</td> --}}
                                            <td>{{ $user->role->name }}</td>
                                            <td>{{ $user->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.user.edit', $user->id) }}"
                                                    class="btn btn-info btn-sm">Edit</a>
                                                <a onclick="return confirm('Are you really sure to delete ?')"
                                                    href="{{ route('admin.user.delete', $user->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Avatar</th>
                                        <th>Role</th>
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
        let table = new DataTable('#userlist');
    </script>
    {{-- data table js end  --}}
@endpush
