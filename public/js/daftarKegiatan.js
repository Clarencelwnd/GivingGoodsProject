// document.addEventListener('DOMContentLoaded', function() {
//     const checkboxes = document.querySelectorAll('.form-check-input');
//     const activityCards = document.querySelectorAll('.activity-card');

//     checkboxes.forEach(checkbox => {
//         checkbox.addEventListener('change', function() {
//             filterActivities();
//         });
//     });

//     function filterActivities() {
//         const selectedTypes = Array.from(checkboxes)
//             .filter(checkbox => checkbox.checked)
//             .map(checkbox => checkbox.id.replace('jenisKegiatan', '').toLowerCase());

//         activityCards.forEach(card => {
//             const cardType = card.getAttribute('data-type');
//             if (selectedTypes.length === 0 || selectedTypes.includes(cardType)) {
//                 card.style.display = 'block';
//             } else {
//                 card.style.display = 'none';
//             }
//         });
//     }
// });

//------------
document.addEventListener('DOMContentLoaded', function() {
    const kegiatanCheckboxes = document.querySelectorAll('.jenis-kegiatan-checkbox');
    const donasiCheckboxes = document.querySelectorAll('.jenis-donasi-checkbox');
    const relawanCheckboxes = document.querySelectorAll('.jenis-relawan-checkbox');
    const activityCards = document.querySelectorAll('.activity-card');

    function filterActivities() {
        // Get selected kegiatan types
        const selectedKegiatanTypes = Array.from(kegiatanCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.id.replace('jenisKegiatan', '').toLowerCase());

        // Get selected donasi types
        const selectedDonasiTypes = Array.from(donasiCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.id.replace('jenisDonasi', '').toLowerCase());

        // Get selected relawan types
        const selectedRelawanTypes = Array.from(relawanCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.id.replace('jenisRelawan', '').toLowerCase());

            console.log('Selected Kegiatan Types:', selectedKegiatanTypes);
            console.log('Selected Donasi Types:', selectedDonasiTypes);
            console.log('Selected Relawan Types:', selectedRelawanTypes);

        activityCards.forEach(card => {
            const cardKegiatanType = card.getAttribute('data-jenis-kegiatan').toLowerCase();
            const cardDonasiTypes = card.getAttribute('data-jenis-donasi').toLowerCase().split(' ');
            const cardRelawanTypes = card.getAttribute('data-jenis-relawan').toLowerCase().split(' ');

                console.log('Selected Kegiatan Types:', selectedKegiatanTypes);
                console.log('Selected Donasi Types:', selectedDonasiTypes);
                console.log('Selected Relawan Types:', selectedRelawanTypes);

            const matchesKegiatan = selectedKegiatanTypes.length === 0 || selectedKegiatanTypes.includes(cardKegiatanType);
            const matchesDonasi = selectedDonasiTypes.length === 0 || selectedDonasiTypes.some(type => cardDonasiTypes.includes(type));
            const matchesRelawan = selectedRelawanTypes.length === 0 || selectedRelawanTypes.some(type => cardRelawanTypes.includes(type));

            if (matchesKegiatan && matchesDonasi && matchesRelawan) {
                card.style.display = 'block';
            }else {
                card.style.display = 'none';
            }
        });
    }

    // Event listener for kegiatan checkboxes
    kegiatanCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            filterActivities();
        });
    });

    // Event listener for donasi checkboxes
    donasiCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                document.getElementById('jenisKegiatanDonasi').checked = true;
            }
            filterActivities();
        });
    });

    // Event listener for relawan checkboxes
    relawanCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                document.getElementById('jenisKegiatanRelawan').checked = true;
            }
            filterActivities();
        });
    });
});




