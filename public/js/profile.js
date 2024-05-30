function openModalView1() {
    const modalView = document.getElementById("btn-logout");
    modalView.display='block';
}

document.addEventListener('DOMContentLoaded', function() {
    var photoInput = document.getElementById('input_photo');
    var photoForm = document.getElementById('photo');

    photoInput.addEventListener('change', function() {
        photoForm.submit();
    });
});
