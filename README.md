# MyDataSiswa (QuestAPI_0145)

Aplikasi Android Jetpack Compose untuk menampilkan, menambah, melihat detail,
mengubah, dan menghapus data siswa melalui REST API PHP + MySQL menggunakan
Retrofit dan Kotlinx Serialization.

## Screenshots

### Tampil & Tambah Data

| Home | Entry (kosong) | Entry (terisi) | Home setelah tambah data |
|:---:|:---:|:---:|:---:|
| <img src="screenshots/1_home.png" width="200"/> | <img src="screenshots/2_entry_empty.png" width="200"/> | <img src="screenshots/3_entry_filled.png" width="200"/> | <img src="screenshots/4_home_after_add.png" width="200"/> |

### Detail, Edit & Hapus Data

| Detail | Edit | Konfirmasi hapus | Home setelah hapus |
|:---:|:---:|:---:|:---:|
| <img src="screenshots/5_detail.png" width="200"/> | <img src="screenshots/6_edit.png" width="200"/> | <img src="screenshots/7_hapus_konfirmasi.png" width="200"/> | <img src="screenshots/8_home_after_hapus.png" width="200"/> |

## Struktur
- `apiservice` – `ServiceApiSiswa`
- `modeldata` – `DataSiswa`
- `repositori` – `RepositoryDataSiswa`, `ContainerApp`, `AplikasiDataSiswa`
- `uicontroller` – route (`DestinasiHome`, `DestinasiEntry`, `DestinasiDetail`, `DestinasiEdit`) dan `PetaNavigasi`
- `view` – `HalamanHome`, `HalamanEntry`, `HalamanDetail`, `HalamanEdit`, `SiswaTopAppBar`
- `viewmodel` – `HomeViewModel`, `EntryViewModel`, `DetailViewModel`, `EditViewModel`, `PenyediaViewModel`

## Server

| Endpoint | Method | Fungsi |
|---|---|---|
| `bacaTeman.php` | GET | Ambil semua data siswa |
| `insertTM.php` | POST | Tambah data siswa |
| `bacaTemanDetail.php?id=` | GET | Ambil satu data siswa |
| `updateTM.php?id=` | POST | Ubah data siswa |
| `deleteTM.php?id=` | GET | Hapus data siswa |

Salin isi folder `server/` ke `htdocs/umyTI/` (XAMPP), lalu jalankan
`server/teman.sql` untuk membuat database `TIUMY` dan tabel `teman`.
Emulator mengakses server lewat `http://10.0.2.2/umyTI/`.
