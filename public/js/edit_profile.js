// MODAL SCHEDULE
function openScheduleModalView() {
    const modalView = document.getElementById("btn-schedule");
    modalView.display='block';
}

document.addEventListener('DOMContentLoaded', function() {

    // MODAL SUCCESFULLY UPDATE PROFILE
    if (document.getElementById('successModal')) {
        // Menampilkan modal
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();

        // Menutup modal setelah 1 detik
        setTimeout(function() {
            successModal.hide();
            window.location.href = url;
        }, 1000);
    }

    // VALIDATION INPUT SCHEDULE
    document.getElementById('btn-save-schedule').addEventListener('click', function() {
        document.getElementById('buttonClicked').value = "1";
    });
});

// MODAL INFORMATION
function openModalInformation() {
    const modalView = document.getElementById("inf-address");
    modalView.display='block';
}


document.addEventListener('DOMContentLoaded', function() {

});
