@extends('admin.layouts.app')
@section('title', $title)
@push('css')
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">{{ $title }}</li>
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
                <!-- Add Category Form -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.category.update', $category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryName">Category Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="categoryName" name="categoryName"
                                        placeholder="Enter category name"
                                        value="{{ old('categoryName', $category->title) }}">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categorySlug">Category Slug <span class="text-danger">*</span></label>
                                    <input readonly type="text" class="form-control" id="categorySlug"
                                        name="categorySlug" placeholder="Enter category name"
                                        value="{{ old('categorySlug', $category->slug) }}">
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="metaTitle">Meta Title (Maximum 60 characters)</label>
                                    <input type="text" class="form-control" id="metaTitle" name="meta_title"
                                        value="{{ old('meta_title', $category->meta_title) }}"
                                        placeholder="Enter meta title">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="metaDescription">Meta Description (Maximum 160 characters)</label>
                                    <textarea class="form-control" id="metaDescription" name="meta_desc" rows="8"
                                        placeholder="Enter meta description">{{ old('meta_desc', $category->meta_desc) }}</textarea>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="meta_keywords">Keywords</label>
                                    <select id="meta_keywords" name="meta_keywords[]" class="form-control"
                                        multiple="multiple">
                                        @php
                                            $keywords = old('meta_keywords', explode(',', $category->meta_keywords));
                                        @endphp
                                        @foreach ($keywords as $keyword)
                                            <option value="{{ $keyword }}" selected>{{ $keyword }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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

@push('scripts')
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    {{-- <script>
        $(document).ready(function() {
            // Function to create a slug from the title
            function slugify(text) {
                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-') // Replace spaces with -
                    .replace(/[^\w\-]+/g, '') // Remove all non-word characters
                    .replace(/\-\-+/g, '-') // Replace multiple - with single -
                    .replace(/^-+/, '') // Trim - from start of text
                    .replace(/-+$/, ''); // Trim - from end of text
            }

            // Automatically fill the slug field based on the title
            $('#categoryName').on('input', function() {
                var title = $(this).val();
                var slug = slugify(title);
                $('#categorySlug').val(slug);
            });
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $('#meta_keywords').select2({
                tags: true,
                tokenSeparators: [','], // Press comma to separate tags
                placeholder: "Enter keywords separated by commas",
                width: '100%'
            });
        });
    </script>
@endpush

@push('ckstyle')
    <style>
        //select 2 styles
        select2-selection__rendered:empty {
            display: none !important;
        }

        li.select2-selection__choice {
            padding: 3px 11px !important;
        }

        button.select2-selection__choice__remove {
            padding: 3px 2px !important;
            margin: 0px 0px !important;
        }
    </style>
@endpush
