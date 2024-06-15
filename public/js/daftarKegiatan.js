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
// document.addEventListener('DOMContentLoaded', function() {
//     const kegiatanCheckboxes = document.querySelectorAll('.jenis-kegiatan-checkbox');
//     const donasiCheckboxes = document.querySelectorAll('.jenis-donasi-checkbox');
//     const relawanCheckboxes = document.querySelectorAll('.jenis-relawan-checkbox');
//     const activityCards = document.querySelectorAll('.activity-card');
//     const jenisKegiatanDonasiCheckbox = document.getElementById('jenisKegiatanDonasi');
//     const jenisKegiatanRelawanCheckbox = document.getElementById('jenisKegiatanRelawan');

//     function filterActivities() {
//         const selectedKegiatanTypes = Array.from(kegiatanCheckboxes)
//             .filter(checkbox => checkbox.checked)
//             .map(checkbox => checkbox.id.replace('jenisKegiatan', '').toLowerCase());

//         const selectedDonasiTypes = Array.from(donasiCheckboxes)
//             .filter(checkbox => checkbox.checked)
//             .map(checkbox => checkbox.id.replace('jenisDonasi', '').toLowerCase());

//         // Get selected relawan types
//         const selectedRelawanTypes = Array.from(relawanCheckboxes)
//             .filter(checkbox => checkbox.checked)
//             .map(checkbox => checkbox.id.replace('jenisRelawan', '').toLowerCase());

//         activityCards.forEach(card => {
//             const cardKegiatanType = card.getAttribute('data-jenis-kegiatan').toLowerCase();
//             const cardDonasiTypes = card.getAttribute('data-jenis-donasi').toLowerCase().split(' ');
//             // const cardRelawanTypes = card.getAttribute('data-jenis-relawan').toLowerCase().split(' ');
//             const cardRelawanTypes = card.getAttribute('data-jenis-relawan') ? card.getAttribute('data-jenis-relawan').toLowerCase().split(' ') : [];

//             const matchesKegiatan = selectedKegiatanTypes.length === 0 || selectedKegiatanTypes.includes(cardKegiatanType);
//             const matchesDonasi = selectedDonasiTypes.length === 0 || selectedDonasiTypes.some(type => cardDonasiTypes.includes(type));
//             const matchesRelawan = selectedRelawanTypes.length === 0 || selectedRelawanTypes.some(type => cardRelawanTypes.includes(type));

//             if (matchesKegiatan && matchesDonasi && matchesRelawan) {
//                 card.style.display = 'block';
//             } else {
//                 card.style.display = 'none';
//             }
//         });
//     }

//     // Event listener for kegiatan checkboxes
//     kegiatanCheckboxes.forEach(checkbox => {
//         checkbox.addEventListener('change', function() {
//             filterActivities();
//         });
//     });

//     // Event listener for donasi checkboxes
//     donasiCheckboxes.forEach(checkbox => {
//         checkbox.addEventListener('change', function() {
//             if (checkbox.checked) {
//                 // Deselect relawan checkboxes
//                 relawanCheckboxes.forEach(relawanCheckbox => {
//                     relawanCheckbox.checked = false;
//                 });
//                 // Select "Donasi" in "Jenis Kegiatan"
//                 jenisKegiatanDonasiCheckbox.checked = true;
//                 jenisKegiatanRelawanCheckbox.checked = false;
//             }
//             filterActivities();
//         });
//     });

//     // Event listener for relawan checkboxes
//     relawanCheckboxes.forEach(checkbox => {
//         checkbox.addEventListener('change', function() {
//             if (checkbox.checked) {
//                 // Deselect donasi checkboxes
//                 donasiCheckboxes.forEach(donasiCheckbox => {
//                     donasiCheckbox.checked = false;
//                 });
//                 // Select "Relawan" in "Jenis Kegiatan"
//                 jenisKegiatanRelawanCheckbox.checked = true;
//                 jenisKegiatanDonasiCheckbox.checked = false;
//             }
//             filterActivities();
//         });
//     });
// });


document.addEventListener('DOMContentLoaded', function() {
    const kegiatanCheckboxes = document.querySelectorAll('.jenis-kegiatan-checkbox');
    const donasiCheckboxes = document.querySelectorAll('.jenis-donasi-checkbox');
    const relawanCheckboxes = document.querySelectorAll('.jenis-relawan-checkbox');
    const activityCards = document.querySelectorAll('.activity-card');
    const jenisKegiatanDonasiCheckbox = document.getElementById('jenisKegiatanDonasi');
    const jenisKegiatanRelawanCheckbox = document.getElementById('jenisKegiatanRelawan');

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

        activityCards.forEach(card => {
            const cardKegiatanType = card.getAttribute('data-jenis-kegiatan').toLowerCase();
            const cardDonasiTypes = card.getAttribute('data-jenis-donasi').toLowerCase().split(' ');
            const cardRelawanTypes = card.getAttribute('data-jenis-relawan') ? card.getAttribute('data-jenis-relawan').toLowerCase().split(' ') : [];

            // Match criteria
            const matchesKegiatan = selectedKegiatanTypes.length === 0 || selectedKegiatanTypes.includes(cardKegiatanType);
            const matchesDonasi = selectedDonasiTypes.length === 0 || selectedDonasiTypes.some(type => cardDonasiTypes.includes(type));
            const matchesRelawan = selectedRelawanTypes.length === 0 || selectedRelawanTypes.some(type => cardRelawanTypes.includes(type));

            if (cardKegiatanType === 'donasi' && matchesKegiatan && (matchesDonasi || selectedDonasiTypes.length === 0)) {
                card.style.display = 'block';
            } else if (cardKegiatanType === 'relawan' && matchesKegiatan && (matchesRelawan || selectedRelawanTypes.length === 0)) {
                card.style.display = 'block';
            } else {
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
                // Deselect relawan checkboxes
                relawanCheckboxes.forEach(relawanCheckbox => {
                    relawanCheckbox.checked = false;
                });
                // Select "Donasi" in "Jenis Kegiatan"
                jenisKegiatanDonasiCheckbox.checked = true;
                jenisKegiatanRelawanCheckbox.checked = false;
            }
            filterActivities();
        });
    });

    // Event listener for relawan checkboxes
    relawanCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                // Deselect donasi checkboxes
                donasiCheckboxes.forEach(donasiCheckbox => {
                    donasiCheckbox.checked = false;
                });
                // Select "Relawan" in "Jenis Kegiatan"
                jenisKegiatanRelawanCheckbox.checked = true;
                jenisKegiatanDonasiCheckbox.checked = false;
            }
            filterActivities();
        });
    });
});






