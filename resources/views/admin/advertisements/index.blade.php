@extends('admin.layouts.app')
@section('title', $title)
@push('css')
    {{-- data table css  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
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
                        <li class="breadcrumb-item ">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>
                            <a class="float-right" href="{{ route('admin.advertisement.create') }}">Add Advertisement +</a>
                        </div>
                        <!-- /.content-header -->
                        @if (session('success'))
                            <div class="alert alert-success m-2">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- /.card-header -->
                        <div class="card-body">
                            @php
                                // built in php method for checking permissions
                                // $hasActions =
                                //     auth()->user()->can('admin.advertisement.edit') ||
                                //     auth()->user()->can('admin.advertisement.delete');

                                //Spatie method for checking permissions
                                $hasActions = auth()
                                    ->user()
                                    ->hasAnyPermission(['admin.advertisement.edit', 'admin.advertisement.delete']);
                            @endphp

                            <table id="postlist" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Clicks</th>
                                        <th>Img</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        @if ($hasActions)
                                            <th>Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Demo data rows -->
                                    @foreach ($advertisements as $advertisement)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $advertisement->name }}</td>
                                            <td>{{ $advertisement->link }}</td>
                                            <td>{{ $advertisement->clicks }}</td>
                                            <td><a target="_blank"
                                                    href="{{ asset('assets/images/banner/' . $advertisement->img) }}">Preview</a>
                                            </td>
                                            <td>{{ $advertisement->created_at->format('d M, Y') }}</td>
                                            <td class="{{ $advertisement->status == 1 ? 'text-success' : 'text-danger' }}">
                                                {{ $advertisement->status == 1 ? 'Active' : 'Inactive' }}
                                            </td>
                                            @if ($hasActions)
                                                <td>
                                                    @can('admin.advertisement.edit')
                                                        <a href="{{ route('admin.advertisement.edit', $advertisement->id) }}"
                                                            class="btn btn-info btn-sm">Edit</a>
                                                    @endcan
                                                    @can('admin.advertisement.delete')
                                                        <a onclick="return confirm('Are you really sure to delete ?')"
                                                            href="{{ route('admin.advertisement.delete', $advertisement->id) }}"
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                    @endcan
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Clicks</th>
                                        <th>Img</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        @if ($hasActions)
                                            <th>Actions</th>
                                        @endif
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
@push('scripts')
    {{-- data table js  --}}
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#postlist');
    </script>
    {{-- data table js end  --}}

    {{-- Filtering script by status  --}}
    <script>
        $(document).ready(function() {
            $('#status').on('change', function() {
                var status = $(this).val();
                var url = new URL(window.location.href); // Get the current URL

                if (status !== "") {
                    url.searchParams.set('status', status); // Set the status parameter
                } else {
                    url.searchParams.delete(
                        'status'); // Remove the status parameter if "All Post" is selected
                }

                // Reload the page with the new URL
                window.location.href = url.toString();
            });
        });
    </script>
    {{-- Filtering script by status  end --}}
@endpush
