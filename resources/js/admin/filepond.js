import * as FilePond from 'filepond';

function initFilepond()
{

    // Parse filepond from body
    FilePond.parse(document.body);
    
    // // Get a file input reference
    // const input = document.querySelector('input[type="file"]');
    
    // console.log('input', input);
    
    // // Create a FilePond instance and post files to /upload
    // FilePond.create(input);

}

export {
    initFilepond 
};