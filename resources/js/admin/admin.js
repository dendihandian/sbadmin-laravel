require('./bootstrap');

import { initFilepond } from './filepond';
import { deleteConfirm } from './swal';

// window object assignations
window.deleteConfirm = deleteConfirm;

// document on load
$(document).ready(function(){
    initFilepond();
});