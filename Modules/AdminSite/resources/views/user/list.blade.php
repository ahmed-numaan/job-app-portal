@extends('adminsite::components.layouts.master')

@section('content')

@include('adminsite::user.form')

<div class="container pt-4">
    <div class="d-flex align-items-center justify-content-between">
        <h3 class="mb-3">Users</h3>
        <button class="btn btn-success mb-3 float-end" id="addUserBtn">
            Add New User
        </button>
    </div>
    
    <table id="usersTable" class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created</th>
            </tr>
        </thead>
    </table>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {

    $('#usersTable').DataTable({
        processing: true,
        serverSide: true,
        stateSave: true,
        ajax: "{{ route('admin.users.data') }}",
        columns: [
            {
                data: null,
                name: 'rownum',
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + 1; // row number
                }
            },
            { data: 'name' },
            { data: 'email' },
            { data: 'role' },
            { data: 'created_at' },
            {
                data: 'id',
                orderable: false,
                searchable: false,
                render: function (id) {
                    return `
                        <button class="btn btn-sm btn-primary editUserBtn" data-id="${id}">
                            Modify
                        </button>
                        <button class="btn btn-sm btn-danger deleteUserBtn" data-id="${id}">
                            Delete
                        </button>
                    `;
                }
            }
        ]
    });

    let userModal = new bootstrap.Modal(document.getElementById('userModal'));

    $(document).ready(function () {

        let table = $('#usersTable').DataTable();

        // Add User
        $('#addUserBtn').on('click', function () {
            $('#userModalTitle').text('Add New User');
            $('#userForm')[0].reset();
            $('.invalid-feedback').text('');
            $('.form-control').removeClass('is-invalid');
            $('#userId').val('');
            $('.passwordField').show(); // show password for new user
            userModal.show();
        });

        // Edit User
        $(document).on('click', '.editUserBtn', function () {
            let id = $(this).data('id');

            $.blockUI({
                message: '<div class="loader"><i class="fas fa-spinner fa-spin"></i></div>',
                css: { backgroundColor: 'transparent', border: '0' }
            });

            $.get(`/admin/users/${id}`, function (user) {
                $('#userModalTitle').text('Modify User');
                $('#userId').val(user.id);
                $('#userName').val(user.name);
                $('#userEmail').val(user.email);
                $('#userRole').val(user.role);

                $('.passwordField').hide(); // hide password on update

                $('.invalid-feedback').text('');
                $('.form-control').removeClass('is-invalid');

                userModal.show();
            }).always(() => {
                $.unblockUI();
            });
        });

        // Save User (Create/Update)
        $('#saveUserBtn').on('click', function () {
            let id = $('#userId').val();
            let url = id ? `/admin/users/${id}` : '/admin/users';
            let method = id ? 'PUT' : 'POST';

            $.blockUI({
                message: '<div class="loader"><i class="fas fa-spinner fa-spin"></i></div>',
                css: { backgroundColor: 'transparent', border: '0' }
            });
            $.ajax({
                url,
                type: method,
                data: $('#userForm').serialize(),
                success: function () {
                    userModal.hide();
                    table.ajax.reload();

                    Swal.fire({
                        icon: 'success',
                        text: id ? 'The user was updated successfully!' : 'A new user is created successfully!'
                    });
                },
                error: function (xhr) {
                    $('.invalid-feedback').text('');
                    $('.form-control').removeClass('is-invalid');

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;

                        for (let field in errors) {
                            let message = errors[field][0];
                            let input = $(`[name="${field}"]`);
                            input.addClass('is-invalid');
                            input.next('.invalid-feedback').text(message);
                        }
                    }
                }
            }).always(() => {
                $.unblockUI();
            });
        });

        // Delete User
        $(document).on('click', '.deleteUserBtn', function () {
            let id = $(this).data('id');

            Swal.fire({
                icon: 'question',
                text: 'Are you sure to delete this user?',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete'
            }).then(result => {
                if (result.isConfirmed) {
                    $.blockUI({
                        message: '<div class="loader"><i class="fas fa-spinner fa-spin"></i></div>',
                        css: { backgroundColor: 'transparent', border: '0' }
                    });
                    $.ajax({
                        url: `/admin/users/${id}`,
                        type: 'DELETE',
                        data: { _token: $('meta[name="csrf-token"]').attr('content') },
                        success: () => {
                            table.ajax.reload();

                            Swal.fire({
                                icon: 'success',
                                text: 'User was deleted successfully!'
                            });
                        }
                    }).always(() => {
                        $.unblockUI();
                    });
                }
            });
        });
    });


});
</script>
@endpush
