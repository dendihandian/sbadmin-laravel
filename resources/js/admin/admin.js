require('./bootstrap');
require('./filepond');

import { deleteConfirm } from './swal';

// window object assignations
window.deleteConfirm = deleteConfirm;

// document on load
$(document).ready(function(){
    // do anything on page loaded
});