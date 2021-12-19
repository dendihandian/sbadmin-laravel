require('./bootstrap');
require('./filepond');

import { deleteConfirm } from './alerts';
import Viewer from 'viewerjs';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic/build/ckeditor';

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

    ClassicEditor
        .create(document.querySelector('.wysiwyg'))
        .catch(error => {
            console.log(`error`, error)
        });

});