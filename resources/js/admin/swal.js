import Swal from 'sweetalert2';

window.deleteConfirm = function(formId, text)
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