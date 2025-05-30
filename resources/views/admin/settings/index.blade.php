@extends('admin.layouts.app')
@section('title', 'Admin Settings')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Web Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Web Settings</li>
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
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General Settings</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="logo">Upload Logo</label>
                                            <input type="file" class="form-control-file" id="logo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="favicon">Upload Favicon</label>
                                            <input type="file" class="form-control-file" id="favicon">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Phone Number</label>
                                            <input type="text" class="form-control" id="socialLinks"
                                                placeholder="Enter social media links">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Email</label>
                                            <input type="text" class="form-control" id="socialLinks"
                                                placeholder="Enter social media links">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Address</label>
                                            <input type="text" class="form-control" id="socialLinks"
                                                placeholder="Enter social media links">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Facebook Link</label>
                                            <input type="text" class="form-control" id="socialLinks"
                                                placeholder="Enter social media links">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Linkedin Link</label>
                                            <input type="text" class="form-control" id="socialLinks"
                                                placeholder="Enter social media links">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Instagram Link</label>
                                            <input type="text" class="form-control" id="socialLinks"
                                                placeholder="Enter social media links">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="socialLinks">Twitter</label>
                                            <input type="text" class="form-control" id="socialLinks"
                                                placeholder="Enter social media links">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
