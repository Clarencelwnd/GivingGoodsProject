function openModalView() {
    const modalView = document.getElementById("keluarAkun");
    modalView.display='block';
}

//clickable cards
document.addEventListener('DOMContentLoaded', function () {
    var cards = document.querySelectorAll('.card-clickable');
    cards.forEach(function (card) {
        card.addEventListener('click', function () {
            var forumId = this.getAttribute('data-id');
            window.location.href = "{{ url('detailForum') }}/" + forumId;
        });
    });
});
