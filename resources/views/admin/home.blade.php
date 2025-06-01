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
                            <h3>{{ $totalCategories ?? 0 }}</h3>
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
                            <h3>{{ $totalPosts ?? 0 }}</h3>
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
                                <table id="postlist" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Desc</th>
                                            <th>Author</th>
                                            <th>Date</th>
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

                                                <td>{{ $post->user->name }}</td>
                                                <td>{{ $post->created_at->format('d M, Y') }}</td>
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
                                            <th>Author</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm btn-secondary float-right">View
                                All Post</a>
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
                                                    <a href="{{ route('admin.category.show', $category->id) }}"
                                                        class="btn btn-primary btn-sm">View</a>
                                                    <a href="{{ route('admin.category.edit', $category->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a onclick="return confirm('Are you really sure to delete ?')"
                                                        href="{{ route('admin.category.delete', $category->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>
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
                        </div>
                        <div class="card-footer clearfix">
                            <a href="{{ route('admin.categories.index') }}"
                                class="btn btn-sm btn-secondary float-right">View All Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
