@extends('adminsite::components.layouts.master')

@section('content')

@include('adminsite::user.form')

<div class="container pt-4">
    <div class="d-flex align-items-center justify-content-between">
        <h3 class="mb-3">Users List</h3>
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


});
</script>
@endpush
