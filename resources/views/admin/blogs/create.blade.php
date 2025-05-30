@extends('admin.layouts.app')
@section('title', 'Create Post')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Post</h1>
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
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="postTitle">Post Title</label>
                                    <input type="text" class="form-control" id="postTitle"
                                        placeholder="Enter post title">
                                </div>
                                <div class="form-group">
                                    <label for="postCategory">Category</label>
                                    <select class="form-control" id="postCategory">
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                        <option>Category 3</option>
                                        <option>Category 4</option>
                                        <option>Category 5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="postAuthor">Author</label>
                                    <input type="text" class="form-control" id="postAuthor"
                                        placeholder="Enter author name">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea class="form-control" id="desc" name="desc" rows="5" placeholder="Enter post desc"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="postDate">Date</label>
                                    <input type="date" class="form-control" id="postDate">
                                </div>
                                <div class="form-group">
                                    <label for="postImage">Post Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="postImage">
                                            <label class="custom-file-label" for="postImage">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="metaTitle">Meta Title</label>
                                    <input type="text" class="form-control" id="metaTitle"
                                        placeholder="Enter meta title">
                                </div>
                                <div class="form-group">
                                    <label for="metaDescription">Meta Description</label>
                                    <textarea class="form-control" id="metaDescription" rows="8" placeholder="Enter meta description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="postTags">Tags</label>
                                    <input type="text" class="form-control" id="postTags"
                                        placeholder="Enter tags separated by commas">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
