function toggleNav(){
    const sidebar = document.getElementById("mySidebar");
    const main = document.getElementById("main");
    if (sidebar.style.width === "250px") {
    sidebar.style.width = "0";
    main.style.marginLeft = "0";
    } else {
    sidebar.style.width = "250px";
    main.style.marginLeft = "250px";
    }
}

function openModalView() {
    const modalView = document.getElementById("keluarAkun");
    modalView.display='block';
}

function activeTab(){
const navLinks = document.querySelectorAll('.nav-item .nav-link');

// Loop through each nav link
navLinks.forEach(link => {
    // Add a click event listener to each link
    link.addEventListener('click', function() {
        // Remove the 'active' class from all links
        navLinks.forEach(link => {
            link.classList.remove('active');
        });
        // Add the 'active' class to the clicked link
        this.classList.add('active');
    });
});
}

