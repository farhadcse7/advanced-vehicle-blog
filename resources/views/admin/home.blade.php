@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Total Categories -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Total Categories</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- Total Posts -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>530</h3>
                            <p>Total Posts</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>530</h3>
                            <p>Pending Posts</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-default">
                        <div class="inner">
                            <h3>530</h3>
                            <p>Published Posts</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- Latest Posts -->
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Latest Posts</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Created AT</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">P001</a></td>
                                            <td>Post Title 1</td>
                                            <td>Category 1</td>
                                            <td>2024-07-01</td>
                                            <td><a href="">View</a> || <a href="">Edit</a> || <a
                                                    href="">Delete</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">P002</a></td>
                                            <td>Post Title 2</td>
                                            <td>Category 2</td>
                                            <td>2024-07-02</td>
                                            <td><a href="">View</a> || <a href="">Edit</a> || <a
                                                    href="">Delete</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">P003</a></td>
                                            <td>Post Title 3</td>
                                            <td>Category 3</td>
                                            <td>2024-07-03</td>
                                            <td><a href="">View</a> || <a href="">Edit</a> || <a
                                                    href="">Delete</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">P003</a></td>
                                            <td>Post Title 3</td>
                                            <td>Category 3</td>
                                            <td>2024-07-03</td>
                                            <td><a href="">View</a> || <a href="">Edit</a> || <a
                                                    href="">Delete</a></td>
                                        </tr>
                                        <!-- Add more posts as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <a href="#" class="btn btn-sm btn-secondary float-right">View All Post</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Latest Categories -->
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Latest Categories</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Category ID</th>
                                            <th>Category Name</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>C001</td>
                                            <td>Category 1</td>
                                            <td>2024-06-01</td>
                                            <td><a href="">View</a> || <a href="">Edit</a> || <a
                                                    href="">Delete</a></td>
                                        </tr>
                                        <tr>
                                            <td>C002</td>
                                            <td>Category 2</td>
                                            <td>2024-06-02</td>
                                            <td><a href="">View</a> || <a href="">Edit</a> || <a
                                                    href="">Delete</a></td>
                                        </tr>
                                        <tr>
                                            <td>C003</td>
                                            <td>Category 3</td>
                                            <td>2024-06-03</td>
                                            <td><a href="">View</a> || <a href="">Edit</a> || <a
                                                    href="">Delete</a></td>
                                        </tr>
                                        <!-- Add more categories as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <a href="#" class="btn btn-sm btn-secondary float-right">View All Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
