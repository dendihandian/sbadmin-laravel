import Swal from 'sweetalert2';

function deleteConfirm(formId, text)
{
    Swal.fire({
        icon: 'warning',
        text: text || 'Do you want to delete this?',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#e3342f',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(formId).submit();
        }
    });
}

export {
    deleteConfirm
};