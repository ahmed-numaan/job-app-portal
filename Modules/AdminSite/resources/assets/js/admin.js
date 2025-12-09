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

import Swal from 'sweetalert2';
window.Swal = Swal;

// BlockUI
import 'block-ui/jquery.blockUI.js';

import 'summernote/dist/summernote-bs4.css';
import 'summernote/dist/summernote-bs4.js';

import moment from 'moment';
window.moment = moment;

import AutoNumeric from 'autonumeric';
window.AutoNumeric = AutoNumeric;

import { TempusDominus } from '@eonasdan/tempus-dominus';
import '@eonasdan/tempus-dominus/dist/css/tempus-dominus.css';
window.TempusDominus = TempusDominus;

import $ from 'jquery';
window.$ = $;
window.jQuery = $;

import select2 from 'select2';
import 'select2/dist/css/select2.min.css';
select2($);

document.addEventListener('DOMContentLoaded', function () {
    
    document.querySelectorAll('.formatted_input').forEach(function (el) {
        new AutoNumeric(el, {
            digitGroupSeparator: ',',
            decimalCharacter: '.',
            decimalPlaces: 0,
        });
    });

    document.querySelectorAll('.date_picker').forEach(function (input) {
        const disable = input.dataset.disable; // read attribute

        const options = {
            display: {
                components: {
                    calendar: true,
                    date: true,
                    month: true,
                    year: true,
                    decades: true,
                    clock: false,
                    hours: false,
                    minutes: false,
                    seconds: false
                },
                buttons: { close: true },
                placement: 'bottom'
            },
            localization: { format: 'yyyy-MM-dd' },
            restrictions: {}
        };

        // Disable past or future dates
        if (disable === 'past') {
            options.restrictions.minDate = new Date(); // today onwards
        } else if (disable === 'future') {
            options.restrictions.maxDate = new Date(); // today backwards
        }

        new TempusDominus(input.closest('.input-group'), options);
    });

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




