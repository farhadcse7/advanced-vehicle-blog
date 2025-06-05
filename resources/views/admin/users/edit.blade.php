@extends('admin.layouts.app')
@section('title', 'Update User')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Update User</li>
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
                        <form action="{{ route('admin.user.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $user->name) }}" placeholder="Enter Name">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password </label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter Password">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ old('email', $user->email) }}" placeholder="Enter Email">
                                </div>

                                <div class="form-group">
                                    <label for="role">Select Role <span class="text-danger">*</span></label>
                                    <select class="form-control" id="role" name="role_id">
                                        <option value="1"
                                            {{ old('role_id', $user->role_id) == '1' ? 'selected' : '' }}>Super Admin
                                        </option>
                                        <option value="2"
                                            {{ old('role_id', $user->role_id) == '2' ? 'selected' : '' }}>Editor
                                        </option>
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
                                    {{-- existing image  --}}
                                    @if ($user->img)
                                        <img src="{{ asset('assets/images/avatar/' . $user->img) }}" alt="Avatar Image"
                                            width="100">
                                    @endif
                                    {{-- existing image end --}}
                                </div>

                                <div class="form-group">
                                    <label for="status">Select Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="0" {{ old('status', $user->status) == '0' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="1" {{ old('status', $user->status) == '1' ? 'selected' : '' }}>
                                            Active</option>
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
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
