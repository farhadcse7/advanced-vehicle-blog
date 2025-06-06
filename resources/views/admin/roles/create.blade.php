@extends('admin.layouts.app')
@section('title', 'Admin Role Create')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Role Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Admin Role Create</li>
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
                <!-- Add Role Form -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Role</h3>
                            <a class="float-right" href="{{ route('admin.users.roles') }}">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                {{-- <input type="hidden" name="_token" value="pmBTZAqbqRo6T3m0Dw27bEmc8mzOCRGyBh97sJ49"> --}}

                                <!-- Role Name Input -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Role Name</label>
                                    <input value="" type="text" class="form-control" name="name"
                                        placeholder="Name" required>
                                </div>

                                <!-- All Permission Toggle -->
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="custom-control custom-checkbox">
                                                <input value="1" type="checkbox" class="custom-control-input"
                                                    name="permission_all" id="permission_all" />
                                                <label for="permission_all" class="custom-control-label text-capitalize">All
                                                    Permission</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Dynamic Permission Groups -->
                                <div class="mb-3">
                                    @foreach ($permissions as $group => $groupPermissions)
                                        <div class="row">
                                            <!-- Group checkbox -->
                                            <div class="col-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="{{ $group }}management"
                                                        onclick="CheckPermissionByGroup('role-{{ $group }}-management-checkbox',this)" value="2">
                                                    <label for="{{ $group }}management" class="custom-control-label text-capitalize">{{ str_replace('-', ' ', $group) }}</label>
                                                </div>
                                            </div>

                                            <!-- Individual permission checkboxes -->
                                            <div class="col-9 role-{{ $group }}-management-checkbox">
                                                @foreach ($groupPermissions as $permission)
                                                    <div class="custom-control custom-checkbox">
                                                        <input name="permissions[]" class="custom-control-input" type="checkbox" id="permission_checkbox_{{ $permission->id }}"
                                                            value="{{ $permission->name }}">
                                                        <label for="permission_checkbox_{{ $permission->id }}" class="custom-control-label">{{ $permission->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!-- Individual permission checkboxes end-->
                                        </div>
                                        <hr>
                                    @endforeach
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
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
@push('scripts')
    <!-- DataTables & Plugins -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            let table = new DataTable('#postlist');
        });
    </script>
    <script>
        $('#permission_all').click(function() {
            if ($(this).is(':checked')) {
                // check all the checkbox
                $('input[type=checkbox]').prop('checked', true);
            } else {
                // uncheck all the checkbox
                $('input[type=checkbox]').prop('checked', false);
            }
        });

        // check permission by group
        function CheckPermissionByGroup(classname, checkthis) {
            const groupIdName = $("#" + checkthis.id);
            const classCheckBox = $('.' + classname + ' input');
            if (groupIdName.is(':checked')) {
                // check all the checkbox
                classCheckBox.prop('checked', true);
            } else {
                // uncheck all the checkbox
                classCheckBox.prop('checked', false);
            }
        }
    </script>
@endpush
