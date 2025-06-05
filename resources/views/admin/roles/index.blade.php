@extends('admin.layouts.app')
@section('title', 'Admin Roles')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Roles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Admin Roles</li>
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
                            <h3 class="card-title">Admin Roles</h3>
                            <a class="float-right btn btn-primary" href="{{ route('admin.users.role.create') }}">Create
                                Role</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="postlist" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Role Name</th>
                                        <th>Permissions</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Demo data rows -->
                                    <tr>
                                        <td>1</td>
                                        <td>Super Admin</td>
                                        <td><span class="badge badge-primary">Post List</span>, <span
                                                class="badge badge-primary">Post Create</span></td>
                                        <td>2024-07-01</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Super Admin</td>
                                        <td><span class="badge badge-primary">Post List</span>, <span
                                                class="badge badge-primary">Post Create</span></td>
                                        <td>2024-07-01</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Super Admin</td>
                                        <td><span class="badge badge-primary">Post List</span>, <span
                                                class="badge badge-primary">Post Create</span></td>
                                        <td>2024-07-01</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Super Admin</td>
                                        <td><span class="badge badge-primary">Post List</span>, <span
                                                class="badge badge-primary">Post Create</span></td>
                                        <td>2024-07-01</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Super Admin</td>
                                        <td><span class="badge badge-primary">Post List</span>, <span
                                                class="badge badge-primary">Post Create</span></td>
                                        <td>2024-07-01</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Super Admin</td>
                                        <td><span class="badge badge-primary">Post List</span>, <span
                                                class="badge badge-primary">Post Create</span></td>
                                        <td>2024-07-01</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Super Admin</td>
                                        <td><span class="badge badge-primary">Post List</span>, <span
                                                class="badge badge-primary">Post Create</span></td>
                                        <td>2024-07-01</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
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

    <!-- DataTables & Plugins -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable();
        });
    </script>
@endsection
