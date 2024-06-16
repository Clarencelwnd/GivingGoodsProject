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

        activityCards.forEach(card => {
            const cardKegiatanType = card.getAttribute('data-jenis-kegiatan').toLowerCase();
            const cardDonasiTypes = card.getAttribute('data-jenis-donasi').toLowerCase().split(' ');
            const cardRelawanTypes = card.getAttribute('data-jenis-relawan').toLowerCase().split(' ');

            const matchesKegiatan = selectedKegiatanTypes.length === 0 || selectedKegiatanTypes.includes(cardKegiatanType);
            const matchesDonasi = selectedDonasiTypes.length === 0 || selectedDonasiTypes.some(type => cardDonasiTypes.includes(type));
            const matchesRelawan = selectedRelawanTypes.length === 0 || selectedRelawanTypes.some(type => cardRelawanTypes.includes(type));// Corrected variable name

            if (matchesKegiatan && matchesDonasi && matchesRelawan) {
                card.style.display = 'block';
            }else {
                card.style.display = 'none';
            }
        });

    }

    // Event listeners for kegiatan checkboxes
    kegiatanCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                // Deselect other jenis kegiatan checkboxes
                kegiatanCheckboxes.forEach(cb => {
                    if (cb !== checkbox) {
                        cb.checked = false;
                    }
                });
            }
            filterActivities();
        });
    });

    // Event listeners for donasi checkboxes
    donasiCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                // Select jenis kegiatan donasi and deselect jenis kegiatan relawan
                document.getElementById('jenisKegiatanDonasi').checked = true;
                document.getElementById('jenisKegiatanRelawan').checked = false;
                // Deselect jenis relawan checkboxes
                relawanCheckboxes.forEach(cb => {
                    cb.checked = false;
                });
            }
            filterActivities();
        });
    });

    // Event listeners for relawan checkboxes
    relawanCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            filterActivities();
        });
    });
});

