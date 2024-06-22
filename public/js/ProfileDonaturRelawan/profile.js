// MODAL LOGOUT
function openModalLogout() {
    const modalView = document.getElementById("btn-logout");
    modalView.display='block';
}

// MODAL INFORMATION
function openModalInformation() {
    const modalView = document.getElementById("inf-address");
    modalView.display='block';
}

document.addEventListener('DOMContentLoaded', function() {
    var photoInput = document.getElementById('input_photo');
    var photoForm = document.getElementById('photo');

    photoInput.addEventListener('change', function() {
        photoForm.submit();
    });
});
