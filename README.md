# 🚀 Taufik Ramadhani - Personal Portfolio

Sebuah website portofolio interaktif dan modern milik **Taufik Ramadhani**, seorang Fullstack Developer, Data Analyst, dan AI Enthusiast. Website ini dirancang dengan antarmuka yang dinamis, dilengkapi dengan animasi background 3D, serta data yang dimuat secara reaktif menggunakan framework frontend.

---

## 🛠️ Teknologi yang Digunakan

Proyek ini dibangun menggunakan kombinasi teknologi modern untuk sisi frontend:
- **HTML5**: Struktur utama halaman web.
- **CSS3 (Vanilla)**: Digunakan untuk styling layout khusus, animasi transisi (*scroll indicator*), serta pewarnaan dan tipografi tingkat lanjut (file `style.css`).
- **Bootstrap 5**: Framework CSS (via CDN) yang digunakan khusus untuk sistem grid yang responsif, struktur kolom (`row`, `col-md-6`), dan margin/padding cepat (`g-3`).
- **Vue.js 3**: Framework JavaScript Frontend (via CDN) yang dimanfaatkan secara spesifik untuk *data binding* statis dan merender daftar *Progress Bar Skill* serta daftar *Cards Certificates* agar kode HTML tetap bersih.
- **Three.js Components (TubesCursor)**: Library interaktif dari pihak ketiga untuk menghasilkan latar belakang 3D berbasis piksel pada elemen `<canvas>`.

---

## 📑 Dokumentasi Fitur & Modul

Berikut adalah pembedahan detail modul, tata letak, dan implementasi kodenya. Setiap bagian menyertakan tabel untuk melampirkan *screenshot* secara mandiri.

### 1. Hero Section & Interactive Background 3D

Bagian utama tampilan (Hero) yang menyambut pengunjung dengan sentuhan elemen 3D bereaksi warna.

| Tampilan (Screenshot) | Deskripsi |
| :---: | :--- |
| *(Tambahkan Screenshot Hero Di Sini)* | Halaman utama dengan tulisan "HEY, I'M TAUFIK RAMADHANI". Tulisan menggunakan efek outline transparan. Latar belakang kanvas memiliki garis-garis *Tubes* berwarna yang akan secara ajaib berubah skema warnanya bila area kosong diklik. |

**Penjelasan Code / Logic:**
- **HTML (`index.html`)**: Terletak pada kontainer `<div class="hero">`.
- **Logika Interaktif (`main.js`)**: 
  - Sistem memanggil modul `TubesCursor` dan menggabungkannya ke `<canvas id="canvas">`. 
  - Konfigurasi awal memiliki *array* default untuk `tubes.colors` dan `lights.colors`.
  - Sistem memasang `document.body.addEventListener('click', ...)`: Setiap klik pengguna di situs, JavaScript akan mengeksekusi fungsi kustom `randomColors(3)` (menghasilkan string kode warna HEX `"#XXXXXX"` secara acak), lalu diset ulamg ke kanvas menggunakan perintah `app.tubes.setColors(...)`.

---

### 2. Top Navigation (Navbar) & Scroll Indicator

Bagian kontrol navigasi tetap yang hanya muncul ketika pengguna melakukan gulir *(scroll)*.

| Tampilan (Screenshot) | Deskripsi |
| :---: | :--- |
| *(Tambahkan Screenshot Navbar Di Sini)* | Menyediakan link ke *Home*, *About*, *Experience*, dan *Certificates*. Navbar ini *sticky* di bagian atas. Indikator berbentuk tiga buah panah "ke bawah" ada di ujung bawah layar. Ketika di-scroll, navigasi perlahan tampil, sedangkan indikator memudar (hilang). |

**Penjelasan Code / Logic:**
- **HTML (`index.html`)**: Memiliki tag standar semantik `<header class="topnav" id="topnav">` beserta `<nav>`. Terdapat juga blok `<div class="scroll-indicator">` persis di atas tag `<script>`.
- **Logika Interaktif (`main.js`)**:
  - `window.addEventListener('scroll', () => { ... })` akan memeriksa bilamana pengguna menggulir halaman lebih dari 10px (`window.scrollY > 10`).
  - Bila benar asersi *scrolling*-nya, metode `classList.toggle()` otomatis menambahkan properti kelas `.show` pada object `topnav` dan atribut kelas `.hide` pada `indicator`.

---

### 3. About & Skills Section

Berisi riwayat hidup santai dan penilaian mandiri terhadap kemampuan teknis *(hard skills)*.

| Tampilan (Screenshot) | Deskripsi |
| :---: | :--- |
| *(Tambahkan Screenshot About Di Sini)* | Gambar potret Taufik (memakai efek *photo-card*) diletakkan di Bootstrap kolom pertama. Kolom kedua berisi rincian teks paragraf "ABOUT" serta grafis baris presentase berbentuk *progress bars* untuk skill JavaScript, React.js, Laravel, Next.js, dll. |

**Penjelasan Code / Logic:**
- **HTML (`index.html`)**: Grid pembungkus `<div class="row align-items-center">`. Pada kolom skill, HTML menyematkan *Vue Directives*: `v-for="skill in skills"`. Panjang presentase bar dihasilkan dari properti inline reaktif Vue berformat `:style="{ width: skill.percent + '%' }"`.
- **Logika Data (`main.js`)**:
  - `skills` diinisialisasi dalam hook metode `data()` *Options API* Vue. Ia adalah *Array of Objects* statis yang strukturnya memuat key `name` dan `percent`. Hal ini mensentralisasi data tanpa perlu mengubah-ubah tag HTML-nya bilamana terjadi pembaruan *skill level*.

---

### 4. Experience Section

Rekapan historikal jejak rekam dalam dunia profesional maupun akademis perkuliahan.

| Tampilan (Screenshot) | Deskripsi |
| :---: | :--- |
| *(Tambahkan Screenshot Experience Di Sini)* | Tampilan senarai daftar memanjang (ul) tempat mencantumkan nama jabatan (misal: "Full Stack Developer", "Laboratory Assistant"), rentang periode, institusi instansi terkait, dan deskripsi tanggung jawab pendek. |

**Penjelasan Code / Logic:**
- **HTML (`index.html`)**: Tidak dikaitkan dengan logika JavaScript alias dibangun statis dengan elemen list `<ul class="exp-list">`. Tampilan pemisah blok tanggal (rentang waktu) dirender dengan CSS menggunakan *flex-box* `display: flex; justify-content: space-between` antara elemen kelas `.exp-role` dan `.exp-time`.

---

### 5. Certificates Section

Ruang eksibisi guna menampilkan pencapaian studi dan penghargaan berbasis sertifikat gambar.

| Tampilan (Screenshot) | Deskripsi |
| :---: | :--- |
| *(Tambahkan Screenshot Certificates Di Sini)* | Kartu-kartu responsif berbentuk *Grid*. Tiap sertifikat memampangkan gambar Thumbnail asli sertifikat tersebut (misal: "The Python Programmer 2025" oleh Udemy), lengkap beserta tombol hipertautan ("view") menuju file gambar pembesaran. |

**Penjelasan Code / Logic:**
- **HTML (`index.html`)**: Menggunakan struktur grid `<div class="row g-3">` yang tiap sel grid-nya dicetak oleh `v-for="cert in certs"` dan dikunci oleh properti `:key`. Properti reaktif Vue difungsikan untuk membinding data link ke atribut HTML gambar dan URL. (Contoh: `:src="cert.src"`, `:href="cert.link"`).
- **Logika Data (`main.js`)**: 
  - Objek array list `certs` diekspor dari aplikasi Vue sebelum di-mount ke `<div id="app">`. Array ini mendata objek kompleks berisi kunci `title`, `issuer`, `year`, referensi statik `src` beserta atribut redirect `link`.
