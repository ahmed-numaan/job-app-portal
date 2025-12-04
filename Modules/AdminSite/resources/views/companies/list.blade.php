@extends('adminsite::components.layouts.master')

@section('content')

@include('adminsite::companies.form')

<div class="container pt-4">
    <div class="d-flex align-items-center justify-content-between">
        <h3 class="mb-3">Companies</h3>
        <button class="btn btn-success mb-3" id="addCompanyBtn">Add New Company</button>
    </div>
    

    <table id="companiesTable" class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Company Name</th>
                <th>Contact Person</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {

    let companyTable = $('#companiesTable').DataTable({
        processing: true,
        serverSide: true,
        stateSave: true,
        ajax: '{{route('admin.companies.data')}}',
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
            { data: 'name',
                render: function(data, type, row) {
                    return `<a href="${row.website}" target="_blank">${row.name}</a>`;
                },
            },
            { data: 'contact_person' },
            { data: 'email' },
            { data: 'phone' },
            {
                data: 'id', orderable: false, searchable: false, render: id => `
                <button class="btn btn-sm btn-primary editCompanyBtn" data-id="${id}">Modify</button>
                <button class="btn btn-sm btn-danger deleteCompanyBtn" data-id="${id}">Delete</button>
            ` }
        ]
    });

    let companyModal = new bootstrap.Modal(document.getElementById('companyModal'));

    // Add company
    $('#addCompanyBtn').on('click', function () {
        $('#companyModalTitle').text('Add Company');
        $('#companyForm')[0].reset();
        $('.invalid-feedback').text('');
        $('.form-control').removeClass('is-invalid');
        $('#companyId').val('');
        companyModal.show();
    });

    // Edit company
    $(document).on('click', '.editCompanyBtn', function () {
        let id = $(this).data('id');
        $.blockUI({
            message: '<div class="loader"><i class="fas fa-spinner fa-spin"></i></div>',
            css: { backgroundColor: 'transparent', border: '0' }
        });
        $.get(`/admin/companies/${id}`, function (company) {
            $('#companyModalTitle').text('Modify Company');
            $('#companyId').val(company.id);
            $('#companyName').val(company.name);
            $('#contactPerson').val(company.contact_person);
            $('#companyEmail').val(company.email);
            $('#companyWebsite').val(company.website);
            $('#companyPhone').val(company.phone);
            $('#companyAddress').val(company.address);
            $('.invalid-feedback').text('');
            $('.form-control').removeClass('is-invalid');
            companyModal.show();
            // $('#companyDescription').summernote('code', company.description ?? '');
        }).always(() => {
            $.unblockUI();
        });
    });

    // Save company (create/update)
    $('#saveCompanyBtn').on('click', function () {
        let id = $('#companyId').val();
        let url = id ? `/admin/companies/${id}` : '/admin/companies';
        let method = id ? 'POST' : 'POST'; // use POST + _method PUT for update

        let formData = new FormData($('#companyForm')[0]);
        if (id) formData.append('_method', 'PUT'); // method spoofing

        $.blockUI({
            message: '<div class="loader"><i class="fas fa-spinner fa-spin"></i></div>',
            css: { backgroundColor: 'transparent', border: '0' }
        });
        $.ajax({
            url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: () => {
                companyModal.hide();
                companyTable.ajax.reload();
                Swal.fire({ icon: 'success', text: id ? 'The company was updated successfully!' : 'A new company is created successfully!' });
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    for (let field in errors) {
                        let input = $(`[name="${field}"]`);
                        input.addClass('is-invalid');
                        input.next('.invalid-feedback').text(errors[field][0]);
                    }
                }
            }
        }).always(() => {
            $.unblockUI();
        });
    });


    // Delete company
    $(document).on('click', '.deleteCompanyBtn', function () {
        let id = $(this).data('id');
        Swal.fire({
            icon: 'question',
            text: 'Are you sure to delete this company?',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete'
        }).then(result => {
            if (result.isConfirmed) {
                //
                $.blockUI({
                    message: '<div class="loader"><i class="fas fa-spinner fa-spin"></i></div>',
                    css: { backgroundColor: 'transparent', border: '0' }
                });
                $.ajax({
                    url: `/admin/companies/${id}`,
                    type: 'DELETE',
                    data: { _token: $('meta[name="csrf-token"]').attr('content') },
                    success: () => {
                        companyTable.ajax.reload();
                        Swal.fire({ icon: 'success', text: 'The company was deleted successfully!' });
                    }
                }).always(() => {
                    $.unblockUI();
                });
            }
        });
    });


});
</script>
@endpush
