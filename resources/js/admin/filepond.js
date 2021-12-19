import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

try {
    // start of Filepond
    window.FilePond = require('filepond');
    FilePond.registerPlugin(
        FilePondPluginImagePreview
    );

    FilePond.parse(document.body);
    // end of Filepond
} catch (error) {
    console.log(error);
}
