# 🍽️ Pemesanan Makanan - Laravel 12 + Filament

Aplikasi berbasis web untuk manajemen pemesanan makanan menggunakan Laravel 12 dan Filament Admin Panel. Sistem ini dirancang untuk mengelola menu, pelanggan, dan pesanan dengan pendekatan struktur data dan pola desain MVC modern.

---

## 🚀 Fitur Utama

- Manajemen **menu makanan/minuman**
- Pendaftaran dan pengelolaan **pelanggan**
- Pencatatan dan pelacakan **pesanan**
- Visualisasi **status pesanan** dalam bentuk chart
- Fitur **search, filter**, dan **bulk action**
- Struktur data: **array, stack, queue, tree, graph**
- Pola desain: **MVC + Search Implementation**

---

## 📁 Struktur Tabel

### 1. `menus`
- `id`
- `name`
- `price`
- `category`
- `available`

### 2. `customers`
- `id`
- `name`
- `phone`
- `user_id` *(relasi ke tabel users)*

### 3. `orders`
- `id`
- `customer_id`
- `menu_ids` *(disimpan dalam array/JSON)*
- `status`

---

## 🧠 Studi Kasus

### 💡 Kasus:
Customer datang ke restoran dan melakukan pemesanan.

### 🔄 Alur:
1. Admin menambahkan daftar menu.
2. Customer (atau kasir) mengisi form pemesanan.
3. Pesanan masuk ke antrian dapur (**queue**).
4. Status pesanan diperbarui dari `pending → processing → done` (**stack**).
5. Admin melihat laporan status melalui **chart**.
6. Sistem dapat menyarankan menu berdasarkan pesanan sebelumnya (**graph**).

---

## 🧩 Implementasi Struktur Data

| Struktur Data | Implementasi                                                                 |
|---------------|------------------------------------------------------------------------------|
| Array         | Menyimpan beberapa `menu_id` dalam 1 order                                   |
| Stack         | Tracking perubahan status pesanan (Last-In-First-Out)                       |
| Queue         | Manajemen antrian pemrosesan order                                           |
| Tree          | Kategori menu bertingkat (parent-child kategori)                            |
| Graph         | Rekomendasi menu berdasarkan riwayat hubungan customer-menu (user behavior) |
| MVC           | Laravel Model-View-Controller untuk seluruh logika                          |
| Search        | Pencarian menu dan customer (Filament `->searchable()`)                     |

---

Order::select('status', DB::raw('count(*) as total'))
    ->groupBy('status')
    ->get();

📌 Catatan Tambahan
Relasi antar tabel menggunakan foreignIdFor.

File MenuResource, OrderResource, dan CustomerResource mengelola form & tabel di Filament.

Gunakan SSH yang valid dan pastikan user GitHub sesuai untuk melakukan push ke repo.

## 🖥️ Instalasi
```bash
  git clone git@github.com:gloriathanos/Pemesanan-Makanan-2025.git
  cd Pemesanan-Makanan-2025
  composer install
  cp .env.example .env
  php artisan key:generate
  php artisan migrate
  php artisan db:seed
  php artisan serve




