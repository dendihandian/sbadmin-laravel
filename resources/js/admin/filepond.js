import { parse, create as filepondCreate } from 'filepond';

function initFilepond()
{
    // Parse filepond from body
    parse(document.body);
}

export {
    initFilepond,
    filepondCreate
};