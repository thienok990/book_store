import Swal from 'sweetalert2';

window.showAlert = function(message, type = 'success') {
    Swal.fire({
        icon: type,
        title: message,
        showConfirmButton: false,
        timer: 2000
    });
};
