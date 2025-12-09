@extends('adminsite::components.layouts.master')

@section('content')

@include('adminsite::vacancies.form', compact('companies', 'skills'))

<div class="container pt-4">
    <div class="d-flex align-items-center justify-content-between">
        <h3 class="mb-3">Vacancies</h3>
        <button class="btn btn-success mb-3" id="addVacancyBtn">Add New Vacancy</button>
    </div>
    

    <table id="vacancyTable" class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Job Title</th>
                <th>Company</th>
                <th>Contact Person</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Applicants</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div>

@endsection

@push('scripts')
<script type='module'>

document.addEventListener("DOMContentLoaded", function () {
    $('#skillIds').select2({ 
        placeholder: 'Select',
        allowClear: true,
        width: '100%',
        dropdownParent: $('#VacancyModal'),
        tags: true,               
        tokenSeparators: [',', ' '], 
        createTag: function(params) {
            var term = $.trim(params.term);

            if (term === '') {
                return null;
            }

            return {
                id: term,
                text: term,
                newTag: true 
            };
        }
    });

    $('#companyId').select2({ 
        placeholder: 'Select',
        allowClear: true,
        width: '100%',
        dropdownParent: $('#VacancyModal')
    });

    let vacancyTable = $('#vacancyTable').DataTable({
        processing: true,
        serverSide: true,
        stateSave: true,
        ajax: '{{route('admin.vacancies.data')}}',
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
            { data: 'job_title' },
            { data: 'company_name' },
            { data: 'contact_person' },
            { data: 'phone' },
            { data: 'email' },
            { data: 'applications_count' },
            {
            data: 'created_at',
                render: function(data) {
                    return moment(data).format('YYYY-MM-DD');
                }
            },
            { data: 'id', orderable: false, searchable: false, render: id => `
                        <button class="btn btn-sm btn-primary editVacancyBtn" data-id="${id}">Modify</button>
                        <button class="btn btn-sm btn-danger deleteVacancyBtn" data-id="${id}">Delete</button>
                    ` }
                ]
            });

    let vacancyModal = new bootstrap.Modal(document.getElementById('VacancyModal'));

    // Add vacancy
    $('#addVacancyBtn').on('click', function () {
        $('#vacancyId').val('');
        $('#vacancyModalTitle').text('Add vacancy');
        $('#vacancyForm')[0].reset();
        $('#skillIds').val([]).trigger('change');
        $('#companyId').val(null).trigger('change');
        $('.invalid-feedback').text('');
        $('.form-control').removeClass('is-invalid');
        $('#vacancyId').val('');
        vacancyModal.show();
    });

    // Edit vacancy
    $(document).on('click', '.editVacancyBtn', function () {
        let id = $(this).data('id');
        $.blockUI({
            message: '<div class="loader"><i class="fas fa-spinner fa-spin"></i></div>',
            css: { backgroundColor: 'transparent', border: '0' }
        });
        $.get(`/admin/vacancies/${id}`, function (vacancy) {
            $('#vacancyModalTitle').text('Modify Vacancy');
            $('#vacancyId').val(vacancy.id);
            $('#location').val(vacancy.location);
            $('#vacancyTitle').val(vacancy.title);
            $('#companyId').val(vacancy.company_id).trigger('change');
            $('#skillIds').val(vacancy.skills_id).trigger('change');
            $('#vacancyType').val(vacancy.vacancy_type);
            $('#experienceLevel').val(vacancy.experience_level);
            const minSalary = AutoNumeric.getAutoNumericElement(document.querySelector('#minSalary'));
            minSalary.set(vacancy.salary_min); 
            const maxSalary = AutoNumeric.getAutoNumericElement(document.querySelector('#maxSalary'));
            maxSalary.set(vacancy.salary_max); 
            $('input[name=date_start]').val(vacancy.date_start)
            $('input[name=date_end]').val(vacancy.date_end)
            $('#description').val(vacancy.description);
            $('#isActive').prop('checked', vacancy.is_active=='1');
            $('.form-control').removeClass('is-invalid');
            vacancyModal.show();
            // $('#vacancyDescription').summernote('code', vacancy.description ?? '');
        }).always(() => {
            $.unblockUI();
        });
    });

    // Save vacancy (create/update)
    $('#saveVacancyBtn').on('click', function () {
        $('.invalid-feedback').text('');
        $('.is-invalid').removeClass('is-invalid');
        let id = $('#vacancyId').val();
        let url = id ? `/admin/vacancies/${id}` : '/admin/vacancies';
        let method = id ? 'POST' : 'POST'; // use POST + _method PUT for update

        let formData = new FormData($('#vacancyForm')[0]);
        document.querySelectorAll('.formatted_input').forEach(function(el) {
            if(el.value !== '') {
                const an = AutoNumeric.getAutoNumericElement(el);
                if(an) { // Check if AutoNumeric element exists
                    formData.set(el.name, an.getNumber());
                } else {
                    formData.set(el.name, el.value); // Fallback to raw value if not AutoNumeric
                }
            } else {
                formData.set(el.name, '');
            }
        });        
        formData.set('is_active',document.getElementById('isActive').checked ? '1' : '0');
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
                vacancyModal.hide();
                vacancyTable.ajax.reload();
                Swal.fire({ icon: 'success', text: id ? 'The job vacancy was updated successfully!' : 'A new job vacancy is created successfully!' });
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    for (let field in errors) {
                        let input = $(`[name="${field}"]`);
                        input.addClass('is-invalid');
                        if(['date_start', 'date_end'].indexOf(field)>=0){
                            input.parent().parent().find('.invalid-feedback:eq(0)').text(errors[field][0]);
                        }else{
                            input.parent().find('.invalid-feedback:eq(0)').text(errors[field][0]);
                        }                    
                    }
                }
            }
        }).always(() => {
            $.unblockUI();
        });
    });


    // Delete vacancy
    $(document).on('click', '.deleteVacancyBtn', function () {
        let id = $(this).data('id');
        Swal.fire({
            icon: 'question',
            text: 'Are you sure to delete this job vacancy?',
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
                    url: `/admin/vacancies/${id}`,
                    type: 'DELETE',
                    data: { _token: $('meta[name="csrf-token"]').attr('content') },
                    success: () => {
                        vacancyTable.ajax.reload();
                        Swal.fire({ icon: 'success', text: 'The job vacancy was deleted successfully!' });
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
