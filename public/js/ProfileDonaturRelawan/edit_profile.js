// MODAL SUCCESFULLY UPDATE PROFILE
document.addEventListener('DOMContentLoaded', function() {
    const datePicker = document.getElementById('datepicker');
    datePicker.addEventListener('change', function(){
        this.value;
    })


    if (document.getElementById('successModal')) {
        // Menampilkan modal
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();

        // Menutup modal setelah 2 detik
        setTimeout(function() {
            successModal.hide();
            window.location.href = url;
        }, 2000);
    }
});

// MODAL INFORMATION
function openModalInformation() {
    const modalView = document.getElementById("inf-address");
    modalView.display='block';
}


