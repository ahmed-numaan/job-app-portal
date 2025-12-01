import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

import 'admin-lte/dist/css/adminlte.min.css';
import 'admin-lte/dist/js/adminlte.min.js';

// Icons
import '@fortawesome/fontawesome-free/css/all.min.css';
import "bootstrap-icons/font/bootstrap-icons.css";

// Import your custom CSS
import '../css/admin.css';

// CSS
import 'overlayscrollbars/css/OverlayScrollbars.min.css';

// JS
import OverlayScrollbars from 'overlayscrollbars';

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
