import './bootstrap';

import.meta.glob([
    '../images/**',
    '../js/**'
]);

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
