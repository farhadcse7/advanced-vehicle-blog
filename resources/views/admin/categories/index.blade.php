@extends('admin.layouts.app')
@section('title', 'Category List')
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
                                        <th>Author</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Demo data rows -->
                                    <tr>
                                        <td>1</td>
                                        <td>Post Title 1</td>
                                        <td>Author 1</td>
                                        <td>2024-07-01</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">View</a>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Post Title 2</td>
                                        <td>Author 2</td>
                                        <td>2024-07-02</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">View</a>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Post Title 3</td>

                                        <td>Author 3</td>
                                        <td>2024-07-03</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">View</a>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Post Title 4</td>

                                        <td>Author 4</td>
                                        <td>2024-07-04</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">View</a>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Post Title 5</td>

                                        <td>Author 5</td>
                                        <td>2024-07-05</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">View</a>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Post Title 6</td>

                                        <td>Author 6</td>
                                        <td>2024-07-06</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">View</a>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Post Title 7</td>

                                        <td>Author 7</td>
                                        <td>2024-07-07</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">View</a>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Post Title 8</td>

                                        <td>Author 8</td>
                                        <td>2024-07-08</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">View</a>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Post Title 9</td>

                                        <td>Author 9</td>
                                        <td>2024-07-09</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">View</a>
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Post Title 10</td>

                                        <td>Author 10</td>
                                        <td>2024-07-10</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">View</a>
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
@endsection
