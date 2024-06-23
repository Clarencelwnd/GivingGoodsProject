//FILTER
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.filter-option').forEach(button => {
        button.addEventListener('click', function() {
            let status = this.getAttribute('data-status');
            document.querySelectorAll('.card').forEach(card => {
                let cardStatus = card.getAttribute('data-status');

                if (status === 'Semua' || cardStatus === status) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});

