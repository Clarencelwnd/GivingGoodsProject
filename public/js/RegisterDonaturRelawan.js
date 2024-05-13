    // document.addEventListener("DOMContentLoaded", function() {
    //     const buatAkunButton = document.querySelector(".btn-primary");
    //     const popupContainer = document.getElementById("popup-container");
    //     const emailInput = document.getElementById("email");
    //     const passwordInput = document.getElementById("password");
    //     const phoneInput = document.getElementById("phone");

    //     buatAkunButton.addEventListener("click", function(event) {
    //         event.preventDefault(); // Menghentikan default submit form

    //         // Validasi input tidak boleh kosong
    //         const email = emailInput.value.trim(); // Trim untuk menghapus spasi kosong di awal dan akhir

    //         if (email === '' || passwordInput.value === '' || phoneInput.value === '') {
    //             alert("Data tidak boleh ada yang kosong");
    //             return;
    //         }

    //         // Validasi email
    //         if (!validateEmail(email)) {
    //             alert("Format email tidak valid");
    //             return;
    //         }

    //         // Validasi password
    //         if (passwordInput.value.length < 8) {
    //             alert("Password harus memiliki minimal 8 karakter");
    //             return;
    //         }

    //         // Validasi nomor telepon
    //         if (!validatePhoneNumber(phoneInput.value)) {
    //             alert("Format nomor telepon tidak valid");
    //             return;
    //         }

    //         // Kirim data ke controller untuk dicek
    //         const formData = new FormData();
    //         formData.append('email', email);
    //         formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    //         fetch( checkEmailRoute , {
    //             method: 'POST',
    //             headers: {
    //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    //             },
    //             body: formData
    //         })
    //         .then(response => {
    //             if (!response.ok) {
    //                 throw new Error('Terjadi kesalahan saat memproses permintaan.');
    //             }
    //             return response.json();
    //         })
    //         .then(data => {
    //             if (data.exists) {
    //                 const popupContent = `
    //                     <div id="popup">
    //                         <h3 style="color: #1C3F5B; font-size: 24px; font-weight: 700;">Email sudah terdaftar</h3>
    //                         <p style="margin-top: 10px;">Lanjutkan dengan email ini? <br>${email}</p>
    //                         <div style="display: flex; justify-content: space-between; margin-top: 20px;">
    //                             <button class="btn-secondary" style="background-color: #FFFFFF; color: #007C92; font-weight: 600; font-size: 16px; margin-right: 10px;">Ubah</button>
    //                             <button class="btn-primary" style="background-color: #00AF71; color: #FFFFFF; font-weight: 600; font-size: 16px; margin-left: 10px;">Ya, Masuk</button>
    //                         </div>
    //                     </div>
    //                 `;
    //                 popupContainer.innerHTML = popupContent;
    //             } else {
    //                 // Email belum terdaftar, simpan data ke database
    //                 fetch( storeRoute, {
    //                     method: 'POST',
    //                     headers: {
    //                         'Content-Type': 'application/json',
    //                         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    //                     },
    //                     body: JSON.stringify({
    //                         email: email,
    //                         password: passwordInput.value,
    //                         // Tambahkan data lain yang diperlukan untuk disimpan
    //                     })
    //                 })
    //                 .then(response => {
    //                     if (!response.ok) {
    //                         throw new Error('Terjadi kesalahan saat memproses permintaan.');
    //                     }
    //                     return response.json();
    //                 })
    //                 .then(data => {
    //                     const popupContent = `
    //                         <div id="popup">
    //                             <h3 style="color: #1C3F5B; font-size: 24px; font-weight: 700;">Berhasil Membuat Akun</h3>
    //                             <img src="{{ asset('image/general/back.png') }}" alt="Icon" style="margin-top: 20px; height:70px; transform: rotate(90deg);">
    //                         </div>
    //                     `;
    //                     popupContainer.innerHTML = popupContent;
    //                     setTimeout(function() {
    //                         window.location.href = "/RegisterSelected";
    //                     }, 4000);
    //                 })
    //                 .catch(error => {
    //                     console.error('Error:', error.message);
    //                     alert(error.message);
    //                 });
    //             }
    //         })
    //         .catch(error => {
    //             console.error('Error:', error.message);
    //             alert(error.message);
    //         });
    //     });

    //     // Fungsi untuk validasi format email
    //     function validateEmail(email) {
    //         const re = /\S+@\S+\.\S+/;
    //         return re.test(email);
    //     }

    //     // Fungsi untuk validasi format nomor telepon
    //     function validatePhoneNumber(phoneNumber) {
    //         // Validasi jika input hanya terdiri dari angka
    //         if (!/^\d+$/.test(phoneNumber)) {
    //             return false;
    //         }
    //         return true;
    //     }
    // });
