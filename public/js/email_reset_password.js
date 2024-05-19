// function openModalView() {
//     const modalView = document.getElementById("keluarAkun");
//     modalView.display='block';
// }

// @if(session()->has('show_popup'))
//     <script>
//         $(document).ready(function(){
//             $('#konfirmasiModal').modal('show');
//         });
//     </script>
// @endif

if(showModal){
    $('#logoutModal').modal('show');
}
