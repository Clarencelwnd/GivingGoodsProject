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

