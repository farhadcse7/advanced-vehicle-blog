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
                                <input type="hidden" name="_token" value="pmBTZAqbqRo6T3m0Dw27bEmc8mzOCRGyBh97sJ49">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Role Name</label>
                                    <input value="" type="text" class="form-control" name="name"
                                        placeholder="Name" required>
                                </div>

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

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="1management"
                                                    onclick="CheckPermissionByGroup('role-1-management-checkbox',this)"
                                                    value="2">
                                                <label for="1management"
                                                    class="custom-control-label text-capitalize">admin</label>
                                            </div>
                                        </div>

                                        <div class="col-9 role-1-management-checkbox">
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_1" value="admin.user.view">
                                                <label for="permission_checkbox_1"
                                                    class="custom-control-label">admin.user.view</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_2" value="admin.user.create">
                                                <label for="permission_checkbox_2"
                                                    class="custom-control-label">admin.user.create</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_3" value="admin.user.edit">
                                                <label for="permission_checkbox_3"
                                                    class="custom-control-label">admin.user.edit</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_4" value="admin.user.delete">
                                                <label for="permission_checkbox_4"
                                                    class="custom-control-label">admin.user.delete</label>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="2management"
                                                    onclick="CheckPermissionByGroup('role-2-management-checkbox',this)"
                                                    value="2">
                                                <label for="2management"
                                                    class="custom-control-label text-capitalize">category</label>
                                            </div>
                                        </div>

                                        <div class="col-9 role-2-management-checkbox">
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_13" value="admin.blog-category.view">
                                                <label for="permission_checkbox_13"
                                                    class="custom-control-label">admin.category.view</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_14" value="admin.blog-category.create">
                                                <label for="permission_checkbox_14"
                                                    class="custom-control-label">admin.category.create</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_15" value="admin.blog-category.edit">
                                                <label for="permission_checkbox_15"
                                                    class="custom-control-label">admin.category.edit</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_16" value="admin.blog-category.delete">
                                                <label for="permission_checkbox_16"
                                                    class="custom-control-label">admin.category.delete</label>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="3management"
                                                    onclick="CheckPermissionByGroup('role-3-management-checkbox',this)"
                                                    value="2">
                                                <label for="3management"
                                                    class="custom-control-label text-capitalize">blog-post</label>
                                            </div>
                                        </div>

                                        <div class="col-9 role-3-management-checkbox">
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_17" value="admin.blog-post.view">
                                                <label for="permission_checkbox_17"
                                                    class="custom-control-label">admin.blog-post.view</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_18" value="admin.blog-post.create">
                                                <label for="permission_checkbox_18"
                                                    class="custom-control-label">admin.blog-post.create</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_19" value="admin.blog-post.edit">
                                                <label for="permission_checkbox_19"
                                                    class="custom-control-label">admin.blog-post.edit</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_20" value="admin.blog-post.delete">
                                                <label for="permission_checkbox_20"
                                                    class="custom-control-label">admin.blog-post.delete</label>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="5management"
                                                    onclick="CheckPermissionByGroup('role-5-management-checkbox',this)"
                                                    value="2">
                                                <label for="5management"
                                                    class="custom-control-label text-capitalize">pages</label>
                                            </div>
                                        </div>

                                        <div class="col-9 role-5-management-checkbox">
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_121" value="admin.about.edit">
                                                <label for="permission_checkbox_121"
                                                    class="custom-control-label">admin.about.edit</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_122" value="admin.disclaimer.edit">
                                                <label for="permission_checkbox_122"
                                                    class="custom-control-label">admin.disclaimer.edit</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_148" value="admin.privacy.edit">
                                                <label for="permission_checkbox_148"
                                                    class="custom-control-label">admin.privacy.edit</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_149" value="admin.terms.edit">
                                                <label for="permission_checkbox_149"
                                                    class="custom-control-label">admin.terms.edit</label>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="6management"
                                                    onclick="CheckPermissionByGroup('role-6-management-checkbox',this)"
                                                    value="2">
                                                <label for="6management"
                                                    class="custom-control-label text-capitalize">contact</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="7management"
                                                    onclick="CheckPermissionByGroup('role-7-management-checkbox',this)"
                                                    value="2">
                                                <label for="7management"
                                                    class="custom-control-label text-capitalize">advertisement</label>
                                            </div>
                                        </div>

                                        <div class="col-9 role-7-management-checkbox">
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_141" value="admin.advertisement.edit">
                                                <label for="permission_checkbox_141"
                                                    class="custom-control-label">admin.advertisement.edit</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_151" value="admin.advertisement.delete">
                                                <label for="permission_checkbox_151"
                                                    class="custom-control-label">admin.advertisement.delete</label>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="8management"
                                                    onclick="CheckPermissionByGroup('role-8-management-checkbox',this)"
                                                    value="2">
                                                <label for="8management" class="custom-control-label text-capitalize">web
                                                    settings</label>
                                            </div>
                                        </div>

                                        <div class="col-9 role-8-management-checkbox">
                                            <div class="custom-control custom-checkbox">
                                                <input name="permissions[]" class="custom-control-input" type="checkbox"
                                                    id="permission_checkbox_5" value="admin.settings.edit">
                                                <label for="permission_checkbox_5"
                                                    class="custom-control-label">admin.settings.edit</label>
                                            </div>
                                        </div>
                                    </div>
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
