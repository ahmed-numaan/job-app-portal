import 'bootstrap';
import 'admin-lte/dist/js/adminlte.min.js';

// JS
import 'overlayscrollbars/styles/overlayscrollbars.css';
import { OverlayScrollbars } from 'overlayscrollbars';

import '../css/custom_admin.css';

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
