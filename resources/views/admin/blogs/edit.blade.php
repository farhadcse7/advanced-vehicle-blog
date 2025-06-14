@extends('admin.layouts.app')
@section('title', 'Update Post')
@push('css')
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update Post</h1>
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
                            <h3 class="card-title">Update Post</h3>
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
                        <form action="{{ route('admin.blog.update', $post->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="postTitle">Post Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="postTitle" name="title"
                                        value="{{ old('title', $post->title) }}" placeholder="Enter post title">
                                    {{-- single error - use input field name --}}
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="postSlug">Post Slug <span class="text-danger">*</span></label>
                                    <input readonly type="text" class="form-control" id="postSlug" name="slug"
                                        value="{{ old('slug', $post->slug) }}" placeholder="Enter post slug">
                                </div>

                                <div class="form-group">
                                    <label for="postCategory">Category <span class="text-danger">*</span></label>
                                    <select class="form-control" id="postCategory" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="postAuthor">Author <span class="text-danger">*</span></label>
                                    <select class="form-control" id="postAuthor" name="user_id">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ old('user_id', $post->user_id) == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="desc">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="desc" name="description" rows="5" placeholder="Enter post desc">{{ old('description', $post->description) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="postImage">Post Image <span class="text-danger">(Recommend size 800x480px
                                            *)</span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="postImage" name="img">
                                            <label class="custom-file-label" for="postImage">Choose file</label>
                                        </div>
                                    </div>
                                    @if ($post->img)
                                        <img src="{{ asset('assets/images/blog/' . $post->img) }}" width="100"
                                            height="100" alt="Post Image">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="metaTitle">Meta Title (Maximum 60 characters)</label>
                                    <input type="text" class="form-control" id="metaTitle" name="meta_title"
                                        value="{{ old('meta_title', $post->meta_title) }}" placeholder="Enter meta title">
                                </div>

                                <div class="form-group">
                                    <label for="metaDescription">Meta Description (Maximum 160 characters)</label>
                                    <textarea class="form-control" id="metaDescription" name="meta_desc" rows="8"
                                        placeholder="Enter meta description">{{ old('meta_desc', $post->meta_desc) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="meta_keywords">Keywords</label>
                                    <select id="meta_keywords" name="meta_keywords[]" class="form-control"
                                        multiple="multiple">
                                        @if (old('meta_keywords', $post->meta_keywords))
                                            @foreach (explode(',', old('meta_keywords', $post->meta_keywords)) as $keyword)
                                                <option value="{{ $keyword }}" selected>{{ $keyword }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="status">Select Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Draft</option>
                                        <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Published
                                        </option>
                                    </select>
                                </div>

                                {{-- Main banner checkbox --}}
                                <div class="form-group">
                                    <label for="is_banner">Set as Banner</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_banner" name="is_banner"
                                            value="1" {{ old('is_banner', $post->is_banner) == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_banner"> Yes</label>
                                    </div>
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
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection

@push('scripts')
    <!-- Include CKEditor 5 from CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/@ckeditor/ckeditor5-inspector@4.1.0/build/inspector.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Page specific script -->
    {{-- <script>
        $(function() {
            let table = new DataTable('#postlist');
        });
    </script> --}}
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
            $('#postTitle').on('input', function() {
                var title = $(this).val();
                var slug = slugify(title);
                $('#postSlug').val(slug);
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
        // CKEditor styles
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
