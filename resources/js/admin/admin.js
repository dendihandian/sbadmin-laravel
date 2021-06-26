require('./bootstrap');
require('./filepond');
// require('./viewer');

import { deleteConfirm } from './swal';
import Viewer from 'viewerjs';

// window object assignations
window.deleteConfirm = deleteConfirm;

// document on load
$(document).ready(function(){
    // do anything on page loaded

    $('.image-view').each(function(index, el){
        console.log(`el`, el);
        console.log(`index`, index);
        const viewer = new Viewer(el, {
            inline: false,
            viewed() {
                viewer.zoomTo(1);
            },
        });
    });
});