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
                        @if (session('success'))
                            <div class="alert alert-success m-2">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger m-2">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- form start -->
                        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="postTitle">Post Title</label>
                                    <input type="text" class="form-control" id="postTitle" name="title"
                                        placeholder="Enter post title">
                                </div>
                                <div class="form-group">
                                    <label for="postSlug">Post Title</label>
                                    <input type="text" class="form-control" id="postSlug" name="slug"
                                        placeholder="Enter post title">
                                </div>
                                <div class="form-group">
                                    <label for="postCategory">Category</label>
                                    <select class="form-control" id="postCategory" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="postAuthor">Author</label>
                                    <select class="form-control" id="postAuthor" name="user_id">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea class="form-control" id="desc" name="description" rows="5" placeholder="Enter post desc"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="postDate">Date</label>
                                    <input type="date" class="form-control" id="postDate">
                                </div>
                                <div class="form-group">
                                    <label for="postImage">Post Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="postImage" name="img">
                                            <label class="custom-file-label" for="postImage">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="metaTitle">Meta Title</label>
                                    <input type="text" class="form-control" id="metaTitle" name="meta_title"
                                        placeholder="Enter meta title">
                                </div>
                                <div class="form-group">
                                    <label for="metaDescription">Meta Description</label>
                                    <textarea class="form-control" id="metaDescription" name="meta_desc" rows="8"
                                        placeholder="Enter meta description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="postTags">Keywords</label>
                                    <input type="text" class="form-control" id="postTags" name="meta_keywords"
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

@push('scripts')
    <!-- Include CKEditor 5 from CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/@ckeditor/ckeditor5-inspector@4.1.0/build/inspector.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            let table = new DataTable('#postlist');
        });
    </script>
    <script>
        // Custom plugin (for example purposes, not adding functionality here)
        function CustomizationPlugin(editor) {}

        // Initialize CKEditor 5 with extended toolbar and plugins
        ClassicEditor
            .create(document.querySelector('#desc'), {
                extraPlugins: [CustomizationPlugin],
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                        'indent', 'outdent', '|',
                        'imageUpload', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
                        'undo', 'redo', 'alignment', 'fontSize', 'fontColor', 'highlight', 'codeBlock'
                    ]
                },
                image: {
                    toolbar: [
                        'imageTextAlternative', 'imageStyle:full', 'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn', 'tableRow', 'mergeTableCells'
                    ]
                },
                language: 'en'
            })
            .then(newEditor => {
                window.editor = newEditor;
                // The following line adds CKEditor 5 inspector.
                CKEditorInspector.attach(newEditor, {
                    isCollapsed: true
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush

@push('ckstyle')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
            /* Minimum height */
            resize: vertical;
            /* Allows vertical resizing */
            overflow: auto;
            /* Enables scrolling */
        }
    </style>
@endpush
