@extends('admin.layouts.app')
@section('title', 'Contact List')
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
                    <h1 class="m-0">Contact List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Contact List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    {{-- @if (session('success'))
        <div class="alert alert-success m-2">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger m-2">
            {{ session('error') }}
        </div>
    @endif --}}

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Contact</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="contactlist" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        {{-- <th>Actions</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td>{{ $contact->message }}</td>
                                            <td>{{ $contact->created_at->format('d M, Y') }}</td>
                                            {{-- <td>
                                                <a href="{{ route('admin.contact.show', $contact->id) }}"
                                                    class="btn btn-primary btn-sm">View</a>

                                                <a href="{{ route('admin.contact.edit', $contact->id) }}"
                                                    class="btn btn-info btn-sm">Edit</a>

                                                <a href="{{ route('admin.contact.delete', $contact->id) }}"
                                                    onclick="return confirm('Are you really sure you want to delete this contact?')"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        {{-- <th>Actions</th> --}}
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
        let table = new DataTable('#contactlist');
    </script>
    {{-- data table js end  --}}
@endpush
