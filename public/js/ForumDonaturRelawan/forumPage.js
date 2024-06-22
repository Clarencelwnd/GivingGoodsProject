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

function countWords(){
    var textarea = document.getElementById("deskripsiForum");
    var wordCountElement = document.getElementById("wordCount");
    var submitButton = document.getElementById("submitForumButton");

    var maxCharacters = 255; // Change this to your desired maximum character count

    var charactersTyped = textarea.value.length;
    var charactersLeft = maxCharacters - charactersTyped;

    //Kalo dia belom type atau charactersleft nya udah 0
    if (charactersTyped == 0) {
        wordCountElement.textContent = "Maks. 255 karakter";
        wordCountElement.style.color = "";
        submitButton.disabled = true;

    }else if( charactersLeft <= 0){
        wordCountElement.textContent = "Maksimum karakter tercapai";
        wordCountElement.style.color = "red";
        submitButton.disabled = true;

    }else {
        wordCountElement.textContent = charactersLeft + " karakter tersisa";
        wordCountElement.style.color = ""; // Reset color
        submitButton.disabled = false;
    }
}
document.addEventListener("DOMContentLoaded", function() {
    // Call countWords function on page load
    countWords();

    // Add input event listener to the textarea
    var textarea = document.getElementById("deskripsiForum");
    textarea.addEventListener("input", countWords);
});
