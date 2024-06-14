// MODAL EXIT CHANGE PASSWORD
function openExitChangePasswordModalView() {
    const modalView = document.getElementById("exitChangePassword");
    modalView.display='block';
}

// MODAL SUCCESSFULLY CHANGE PASSWORD
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('successModal')) {
        // Menampilkan modal
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();

        // Menutup modal setelah 2 detik
        setTimeout(function() {
            successModal.hide();
            window.location.href = url;
        }, 1000);
    }
});


