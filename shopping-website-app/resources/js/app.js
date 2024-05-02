import './bootstrap';

import.meta.glob([
    '../images/**',
    '../js/**',
    '../icons/**'
]);

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
