import $ from 'jquery';
window.$ = window.jQuery = $;

// Now Bootstrap (it needs jQuery globally)
import 'bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import '../lib/owlcarousel/assets/owl.carousel.min.css';
import '../lib/animate/animate.min.css';

import("../lib/easing/easing.min.js");
import("../lib/waypoints/waypoints.min.js");
import("../lib/owlcarousel/owl.carousel.min.js");

import("./main.js");