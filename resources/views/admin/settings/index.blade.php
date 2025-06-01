@extends('admin.layouts.app')
@section('title', 'Admin Settings')
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
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    {{-- Logo --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="logo">Upload Logo</label>
                                            <input type="file" class="form-control-file" id="logo" name="logo">
                                            @if ($data->logo)
                                                <p>Current: <img src="{{ asset('assets/images/' . $data->logo) }}"
                                                        height="40">
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Favicon --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="favicon">Upload Favicon</label>
                                            <input type="file" class="form-control-file" id="favicon" name="fav_icon">
                                            @if ($data->fav_icon)
                                                <p>Current: <img src="{{ asset('assets/images/' . $data->fav_icon) }}"
                                                        height="40"></p>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Phone --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                value="{{ old('phone', $data->phone) }}">
                                        </div>
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                value="{{ old('email', $data->email) }}">
                                        </div>
                                    </div>

                                    {{-- Address --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                value="{{ old('address', $data->address) }}">
                                        </div>
                                    </div>

                                    {{-- Facebook --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fb">Facebook Link</label>
                                            <input type="text" class="form-control" id="fb" name="fb"
                                                value="{{ old('fb', $data->fb) }}">
                                        </div>
                                    </div>

                                    {{-- Instagram --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insta">Instagram Link</label>
                                            <input type="text" class="form-control" id="insta" name="insta"
                                                value="{{ old('insta', $data->insta) }}">
                                        </div>
                                    </div>

                                    {{-- Twitter --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="twitter">Twitter</label>
                                            <input type="text" class="form-control" id="twitter" name="twitter"
                                                value="{{ old('twitter', $data->twitter) }}">
                                        </div>
                                    </div>

                                    {{-- Global Meta Title --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="meta_title">Meta Title (Max 60 characters)</label>
                                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                                value="{{ old('meta_title', $data->meta_title) }}">
                                        </div>
                                    </div>

                                    {{-- Global Meta Keywords --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="meta_keywords">Meta Keywords</label>
                                            <select id="meta_keywords" name="meta_keywords[]" class="form-control"
                                                multiple>
                                                @foreach (explode(',', old('meta_keywords', $data->meta_keywords)) as $keyword)
                                                    <option value="{{ $keyword }}" selected>{{ $keyword }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Global Meta Description --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="meta_desc">Meta Description (Max 160 characters)</label>
                                            <textarea class="form-control" id="meta_desc" name="meta_desc" rows="4">{{ old('meta_desc', $data->meta_desc) }}</textarea>
                                        </div>
                                    </div>

                                    {{-- Blog Meta Title --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="blog_meta_title">Blog Meta Title</label>
                                            <input type="text" class="form-control" id="blog_meta_title"
                                                name="blog_meta_title"
                                                value="{{ old('blog_meta_title', $data->blog_meta_title) }}">
                                        </div>
                                    </div>

                                    {{-- Blog Meta Keywords --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="blog_meta_keywords">Blog Meta Keywords</label>
                                            <select id="blog_meta_keywords" name="blog_meta_keywords[]"
                                                class="form-control" multiple>
                                                @foreach (explode(',', old('blog_meta_keywords', $data->blog_meta_keywords)) as $keyword)
                                                    <option value="{{ $keyword }}" selected>{{ $keyword }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Blog Meta Description --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="blog_meta_desc">Blog Meta Description (Max 160 characters)</label>
                                            <textarea class="form-control" id="blog_meta_desc" name="blog_meta_desc" rows="4">{{ old('blog_meta_desc', $data->blog_meta_desc) }}</textarea>
                                        </div>
                                    </div>

                                    {{-- Contact Meta Title --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_meta_title">Contact Meta Title</label>
                                            <input type="text" class="form-control" id="contact_meta_title"
                                                name="contact_meta_title"
                                                value="{{ old('contact_meta_title', $data->contact_meta_title) }}">
                                        </div>
                                    </div>
                                    {{-- Contact Meta Keywords --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_meta_keywords">Contact Meta Keywords</label>
                                            <select id="contact_meta_keywords" name="contact_meta_keywords[]"
                                                class="form-control" multiple>
                                                @foreach (explode(',', old('contact_meta_keywords', $data->contact_meta_keywords)) as $keyword)
                                                    <option value="{{ $keyword }}" selected>{{ $keyword }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Contact Meta Description --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="contact_meta_desc">Contact Meta Description (Max 160
                                                characters)</label>
                                            <textarea class="form-control" id="contact_meta_desc" name="contact_meta_desc" rows="4">{{ old('contact_meta_desc', $data->contact_meta_desc) }}</textarea>
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
            .create(document.querySelector('#pagebody'), {
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
            $('#meta_keywords,#blog_meta_keywords,#contact_meta_keywords').select2({
                tags: true,
                tokenSeparators: [','], // Press comma to separate tags
                placeholder: "Enter keywords separated by commas",
                width: '100%'
            });
        });
    </script>
@endpush
