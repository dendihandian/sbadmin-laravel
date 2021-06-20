require('./bootstrap');

import { initFilepond, filepondCreate } from './filepond';
import { deleteConfirm } from './swal';

// window object assignations
window.deleteConfirm = deleteConfirm;
window.filepondCreate = filepondCreate;

// document on load
$(document).ready(function(){
    // NOTE: that initFilepond function is already loaded... I don't know why.
});