document.addEventListener("DOMContentLoaded", function() {
    const registerButtons = document.querySelectorAll(".btn-register-choose-role");

    registerButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            // Remove 'clicked' class from all buttons
            registerButtons.forEach(function(btn) {
                btn.classList.remove("clicked");
            });

            // Add 'clicked' class to the clicked button
            this.classList.add("clicked");
        });
    });
});
