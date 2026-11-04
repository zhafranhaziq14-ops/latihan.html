function semakUmur() {
    let umur = parseInt(document.getElementById('umurInput').value);
    let statusElemen = document.getElementById('statusUmur');

    if (isNaN(umur)) {
        statusElemen.innerHTML = "Sila masukkan nombor umur yang sah!";
        statusElemen.style.color = "red";
        return;
    }

    let kategoriText = "";

    if (umur >= 60) {
        kategoriText = "Kategori: Warga Emas (Layak Diskaun 20%)";
    } else if (umur >= 18 && umur <= 59) {
        kategoriText = "Kategori: Dewasa";
    } else {
        kategoriText = "Kategori: Kanak-kanak Kucing (Percuma Susu)";
    }

    statusElemen.innerText = kategoriText;
    statusElemen.style.color = "#000000";
}

function kiraPesanan() {
    let kodMenu = parseInt(document.getElementById('kodMenu').value);
    let kuantiti = parseInt(document.getElementById('kuantitiInput').value);
    let resitElemen = document.getElementById('resitPesanan');

    if (isNaN(kodMenu) || isNaN(kuantiti) || kuantiti <= 0) {
        resitElemen.innerHTML = "<span style='color: #ff6b6b;'>Sila masukkan kod menu (1-3) dan kuantiti yang sah!</span>";
        return;
    }

    let namaMenu = "";
    let hargaSeunit = 0;

    switch (kodMenu) {
        case 1:
            namaMenu = "Kopi Oyen";
            hargaSeunit = 5.00;
            break;
        case 2:
            namaMenu = "Kek Ikan";
            hargaSeunit = 10.00;
            break;
        case 3:
            namaMenu = "Susu Segar";
            hargaSeunit = 4.00;
            break;
        default:
            resitElemen.innerHTML = "<span style='color: #ff6b6b;'>Ralat: Kod menu tidak sah! Sila masukkan kod 1 hingga 3 sahaja.</span>";
            return;
    }

    let jumlahHarga = hargaSeunit * kuantiti;

    resitElemen.innerHTML = `Pesanan anda: <b>${namaMenu}</b><br>` +
                            `Kuantiti: <b>${kuantiti}</b><br>` +
                            `Jumlah Perlu Dibayar: <b>RM${jumlahHarga.toFixed(2)}</b>`;
    resitElemen.style.color = "#000000";
}

function janaKupon() {
    let jumlahKupon = parseInt(document.getElementById('jumlahKupon').value);
    let kuponElemen = document.getElementById('paparanKupon');

    if (isNaN(jumlahKupon) || jumlahKupon <= 0) {
        kuponElemen.innerHTML = "<span style='color: #ff6b6b;'>Sila masukkan jumlah kupon yang sah!</span>";
        return;
    }

    let senaraiKuponHTML = "";

    for (let i = 1; i <= jumlahKupon; i++) {
        senaraiKuponHTML += `Kupon ke-${i}: Sah untuk Cabutan Oyen!<br>`;
    }

    kuponElemen.innerHTML = senaraiKuponHTML;
    kuponElemen.style.color = "#000000";
}