@extends('admin.layouts.app')
@section('title', 'Privacy & Policy')
@section('content')
     <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Privacy & Policy</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item ">Privacy & Policy</li>
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
                                    <h3 class="card-title">Privacy & Policy</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="Title">Page Title</label>
                                            <input type="text" class="form-control" id="Title" placeholder="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="pagebody">Page Body</label>
                                            <textarea name="pagebody" id="pagebody" class="form-control" placeholder="page body" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="metatitle">Meta Title</label>
                                            <input type="text" class="form-control" name="metatitle" id="metatitle" placeholder="meta title">
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_desc">Meta Description</label>
                                            <textarea name="meta_desc" id="meta_desc" placeholder="meta desc" class="form-control" rows="2"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_keywords">Meta Keywords</label>
                                            <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="meta keywords">
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
