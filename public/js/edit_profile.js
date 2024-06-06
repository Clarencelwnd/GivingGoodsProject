// USING BUTTON
function openScheduleModalView1() {
    const modalView = document.getElementById("btn-jam-operasional");
    modalView.display='block';
}

// USING ICON/IMAGE
function openScheduleModalView2() {
    const modalView = document.getElementById("btn-img");
    modalView.display='block';
}

// MODAL SUCCESFULLY UPDATE PROFILE
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
