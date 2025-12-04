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
window.Swal = Swal;

// BlockUI
import 'block-ui/jquery.blockUI.js';

import 'summernote/dist/summernote-bs4.css';
import 'summernote/dist/summernote-bs4.js';

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




