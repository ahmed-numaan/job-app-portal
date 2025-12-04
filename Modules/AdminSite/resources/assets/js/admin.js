import 'bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import 'admin-lte/dist/js/adminlte.min.js';

// JS
import 'overlayscrollbars/styles/overlayscrollbars.css';
import { OverlayScrollbars } from 'overlayscrollbars';

/* Datatables */
import 'datatables.net-bs5';
import 'datatables.net-responsive-bs5';

import $ from 'jquery';
import jQuery from 'jquery';

import Swal from 'sweetalert2';

// BlockUI
import 'block-ui/jquery.blockUI.js';

window.$ = window.jQuery = $;

document.addEventListener('DOMContentLoaded', function () {
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
    };

    const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

    const isMobile = window.innerWidth <= 992;

    if (sidebarWrapper && OverlayScrollbars && !isMobile) {
        OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
                theme: Default.scrollbarTheme,
                autoHide: Default.scrollbarAutoHide,
                clickScroll: Default.scrollbarClickScroll,
            },
        });
    }
});



let userModal = new bootstrap.Modal(document.getElementById('userModal'));

$(document).ready(function () {

    let table = $('#usersTable').DataTable();

    // 🎯 Add User
    $('#addUserBtn').on('click', function () {
        $('#userModalTitle').text('Add New User');
        $('#userForm')[0].reset();
        $('.invalid-feedback').text('');
        $('.form-control').removeClass('is-invalid');
        $('#userId').val('');
        $('.passwordField').show(); // show password for new user
        userModal.show();
    });

    // 🎯 Edit User
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

    // 🎯 Save User (Create/Update)
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
                    text: id ? 'User updated!' : 'User created!'
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

    // 🎯 Delete User
    $(document).on('click', '.deleteUserBtn', function () {
        let id = $(this).data('id');

        Swal.fire({
            icon: 'question',
            text: 'Are you sure you would like to delete this user?',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete'
        }).then(result => {
            if (result.isConfirmed) {

                $.ajax({
                    url: `/admin/users/${id}`,
                    type: 'DELETE',
                    data: { _token: $('meta[name="csrf-token"]').attr('content') },
                    success: () => {
                        table.ajax.reload();

                        Swal.fire({
                            icon: 'success',
                            text: 'User deleted!'
                        });
                    }
                });
            }
        });
    });
});
