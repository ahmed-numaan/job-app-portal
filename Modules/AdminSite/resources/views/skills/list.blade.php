@extends('adminsite::components.layouts.master')

@section('content')

@include('adminsite::skills.form')

<div class="container pt-4">
    <div class="d-flex align-items-center justify-content-between">
        <h3 class="mb-3">Skills</h3>
        <button class="btn btn-success mb-3" id="addSkillBtn">Add New skill</button>
    </div>
    

    <table id="skillsTable" class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Skill Name</th>
                <th>Date created</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {

    let skillTable = $('#skillsTable').DataTable({
        processing: true,
        serverSide: true,
        stateSave: true,
        ajax: '{{route('admin.skills.data')}}',
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
            { data: 'created_at' },
            {
                data: 'id', orderable: false, searchable: false, render: id => `
                <button class="btn btn-sm btn-primary editSkillBtn" data-id="${id}">Modify</button>
                <button class="btn btn-sm btn-danger deleteSkillBtn" data-id="${id}">Delete</button>
            ` }
        ]
    });

    let skillModal = new bootstrap.Modal(document.getElementById('skillModal'));

    // Add skill
    $('#addSkillBtn').on('click', function () {
        $('#skillModalTitle').text('Add skill');
        $('#skillForm')[0].reset();
        $('.invalid-feedback').text('');
        $('.form-control').removeClass('is-invalid');
        $('#skillId').val('');
        skillModal.show();
    });

    // Edit skill
    $(document).on('click', '.editSkillBtn', function () {
        let id = $(this).data('id');
        $.blockUI({
            message: '<div class="loader"><i class="fas fa-spinner fa-spin"></i></div>',
            css: { backgroundColor: 'transparent', border: '0' }
        });
        $.get(`/admin/skills/${id}`, function (skill) {
            $('#skillModalTitle').text('Modify skill');
            $('#skillId').val(skill.id);
            $('#skillName').val(skill.name);
            $('.invalid-feedback').text('');
            $('.form-control').removeClass('is-invalid');
            skillModal.show();
            // $('#skillDescription').summernote('code', skill.description ?? '');
        }).always(() => {
            $.unblockUI();
        });
    });

    // Save skill (create/update)
    $('#saveSkillBtn').on('click', function () {
        let id = $('#skillId').val();
        let url = id ? `/admin/skills/${id}` : '/admin/skills';
        let method = id ? 'POST' : 'POST'; // use POST + _method PUT for update

        let formData = new FormData($('#skillForm')[0]);
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
                skillModal.hide();
                skillTable.ajax.reload();
                Swal.fire({ icon: 'success', text: id ? 'The skill was updated successfully!' : 'A new skill is created successfully!' });
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


    // Delete skill
    $(document).on('click', '.deleteSkillBtn', function () {
        let id = $(this).data('id');
        Swal.fire({
            icon: 'question',
            text: 'Are you sure to delete this skill?',
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
                    url: `/admin/skills/${id}`,
                    type: 'DELETE',
                    data: { _token: $('meta[name="csrf-token"]').attr('content') },
                    success: () => {
                        skillTable.ajax.reload();
                        Swal.fire({ icon: 'success', text: 'The skill was deleted successfully!' });
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
