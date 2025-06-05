@extends('admin.layouts.app')
@section('title', 'Create User')
{{-- @push('css')
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
@endpush --}}
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">User List</li>
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
                            <h3 class="card-title">Add New User</h3>
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
                        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="Enter Name">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password"
                                         placeholder="Enter Password">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}" placeholder="Enter Email">
                                </div>

                                <div class="form-group">
                                    <label for="role">Select Role <span class="text-danger">*</span></label>
                                    <select class="form-control" id="role" name="role_id">
                                        <option>Select Role</option>
                                        <option value="1">Super Admin</option>
                                        <option value="2">Editor</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="avatar">Post Image <span class="text-danger">(Recommend size 100x100px
                                            *)</span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="avatar" name="img">
                                            <label class="custom-file-label" for="avatar">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status">Select Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="0">Pending</option>
                                        <option value="1">Active</option>
                                    </select>
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
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

    <script>
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
    </script>

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
