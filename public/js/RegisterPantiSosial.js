document.addEventListener("DOMContentLoaded", function() {
    const buatAkunButton = document.querySelector(".btn-primary");
    const popupContainer = document.getElementById("popup-container");
    buatAkunButton.addEventListener("click", function() {
        popupContainer.style.display = "block";
    });
});

