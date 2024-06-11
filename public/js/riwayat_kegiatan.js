// SELECTED FILTER BUTTON
document.addEventListener('DOMContentLoaded', function() {
    let kegiatan = document.querySelectorAll('.kegiatan[data-status-kegiatan]');
    kegiatan.forEach(function(element){
        let statusKegiatan = element.getAttribute('data-status-kegiatan');
        element.classList.add(statusKegiatan);
    });

    const filterButtons = document.querySelectorAll('.btn-filter');
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            filterButtons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
            updateSubFilters(this.getAttribute('data-filter'));
        });
    });

    updateSubFilters('semua');
});

// SHOW DATA & SUBFILTER BUTTON
function updateSubFilters(filterType) {
    const dataItems = document.querySelectorAll('.data-item');

    dataItems.forEach(item => {
        if ((filterType === 'semua' || item.classList.contains(filterType))) {
            item.classList.add('active');
            item.style.display = 'block';
        } else {
            item.classList.remove('active');
            item.style.display = 'none';
        }
    });

    const subFilterContainer = document.getElementById('sub-filter');
    subFilterContainer.innerHTML = '';

    let subFilterOptions = '';
    if (filterType === 'donasi') {
        subFilterOptions = `
            <button type="button" onclick="updateSubFilter(this)" data-filter="${filterType}" data-sub-filter="sedang_diproses" class="col-auto btn btn-sub-filter" id="btn-sedang-diproses">Sedang Diproses</button>
            <button type="button" onclick="updateSubFilter(this)" data-filter="${filterType}" data-sub-filter="donasi_diterima" class="col-auto btn btn-sub-filter" id="btn-donasi-diterima">Donasi Diterima</button>
        `;
    } else if (filterType === 'relawan') {
        subFilterOptions = `
            <button type="button" onclick="updateSubFilter(this)" data-filter="${filterType}" data-sub-filter="menunggu_konfirmasi" class="col-auto btn btn-sub-filter" id="btn-menunggu konfirmasi">Menunggu Konfirmasi</button>
            <button type="button" onclick="updateSubFilter(this)" data-filter="${filterType}" data-sub-filter="relawan_diterima" class="col-auto btn btn-sub-filter" id="btn-relawan-diterima">Relawan Diterima</button>
            <button type="button" onclick="updateSubFilter(this)" data-filter="${filterType}" data-sub-filter="relawan_ditolak" class="col-auto btn btn-sub-filter" id="btn-relawan-ditolak">Relawan Ditolak</button>
        `;
    }
    subFilterContainer.innerHTML = subFilterOptions;
}

// SELECTED SUBFILTER BUTTON
function updateSubFilter(button) {
    const filterType = button.getAttribute('data-filter');
    const subFilterValue = button.getAttribute('data-sub-filter');

    const subFilterButtons = button.parentElement.querySelectorAll('.btn-sub-filter');
    subFilterButtons.forEach(btn => btn.classList.remove('selected'));

    button.classList.add('selected');

    filterData(filterType, subFilterValue);
}

// SHOW DATA
function filterData(filterType, subFilterValue) {
    const dataItems = document.querySelectorAll('.data-item');

    dataItems.forEach(item => {
        if ((filterType === 'semua' || item.classList.contains(filterType)) &&
            (subFilterValue === null || item.classList.contains(subFilterValue))) {
            item.classList.add('active');
            item.style.display = 'block';
        } else {
            item.classList.remove('active');
            item.style.display = 'none';
        }
    });
}

