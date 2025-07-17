<div align="center">

# **CRUD Ulasan Canva**
==========================================================================

CRUD Ulasan Canva adalah aplikasi web yang dirancang untuk mengelola ulasan pengguna terhadap platform Canva. Sistem ini mengintegrasikan analisis sentimen untuk mengkategorikan ulasan menjadi Positif, Negatif, atau Netral, serta menyediakan interface admin yang modern dan user-friendly.

<br/>

<a href="https://github.com/AlRafi004/CRUD-Ulasan-Canva">
  <img src="https://img.shields.io/badge/GitHub-CRUD--Ulasan--Canva-purple?style=for-the-badge&logo=github" />
</a>
<a href="https://php.net">
  <img src="https://img.shields.io/badge/PHP-8.2.12-blue?style=for-the-badge&logo=php" />
</a>
<a href="https://mysql.com">
  <img src="https://img.shields.io/badge/MySQL-8.0-orange?style=for-the-badge&logo=mysql" />
</a>
<a href="https://getbootstrap.com">
  <img src="https://img.shields.io/badge/Bootstrap-4.1.3-purple?style=for-the-badge&logo=bootstrap" />
</a>

</div>

---

## ✨ Fitur Utama

- 🏠 **Homepage Modern** - Landing page dengan desain Canva branding
- 👤 **Sistem Autentikasi** - Login admin yang aman dengan session management
- 📊 **CRUD Operations** - Create, Read, Update, Delete ulasan lengkap
- 📄 **Pagination System** - Navigasi halaman untuk mengelola data besar
- 🎯 **Analisis Sentimen** - Kategorisasi otomatis sentiment ulasan
- 📈 **Dashboard Analytics** - Statistik dan overview data ulasan
- 📤 **Export Functionality** - Export data individual dan bulk
- 🎨 **Modern UI/UX** - Desain responsif dengan Canva color scheme
- 🔍 **Search & Filter** - Pencarian dan filter data ulasan

---

## 🛠️ Tech Stack

| Component      | Technology              | Version      |
| -------------- | ----------------------- | ------------ |
| **Backend**    | PHP                     | 8.2.12       |
| **Database**   | MySQL                   | 8.0+         |
| **Frontend**   | HTML5, CSS3, JavaScript | -            |
| **Framework**  | Bootstrap               | 4.1.3        |
| **Icons**      | Font Awesome            | 5.15.4       |
| **Typography** | Rubik Font              | Google Fonts |
| **Server**     | Apache (XAMPP)          | 2.4.58       |

---

## 📁 Struktur Project

```
CRUD-Ulasan-Canva/
├── 📄 index.php                    # Homepage utama
├── 📄 ulasan_canva.sql             # Database schema
├── 📄 ACCOUNT LOGIN DETAILS.txt    # Kredensial login
├── 📄 README.md                    # Dokumentasi project
│
├── 📁 assets/                      # Asset frontend
│   ├── 📁 css/                     # Stylesheets
│   ├── 📁 js/                      # JavaScript files
│   ├── 📁 images/                  # Images & logos
│   ├── 📁 fonts/                   # Font files
│   └── 📁 sass/                    # SCSS source files
│
├── 📁 backend/                              # Backend application
│   └── 📁 admin/                            # Admin panel
│       ├── 📄 index.php                     # Admin login
│       ├── 📄 admin_view_reviews.php        # Daftar ulasan
│       ├── 📄 admin_view_single_review.php  # Detail ulasan
│       ├── 📄 admin_add_new_review.php      # Tambah ulasan
│       ├── 📄 admin_edit_review.php         # Edit ulasan
│       ├── 📄 admin_delete_review.php       # Hapus ulasan
│       ├── 📄 admin_export_review.php       # Export single
│       ├── 📄 admin_export_all_reviews.php  # Export all
│       └── 📁 assets/                       # Admin assets
│           ├── 📁 css/                      # Admin stylesheets
│           ├── 📁 js/                       # Admin JavaScript
│           ├── 📁 images/                   # Admin images
│           └── 📁 inc/                      # Include files
│               ├── 📄 config.php            # Database config
│               ├── 📄 checklogin.php        # Auth checker
│               └── 📄 nav.php               # Navigation
│
└── 📁 DATABASE FILE/               # Additional DB files
```

---

## ⚡ Quick Start

### Prerequisites

- **XAMPP** v3.2.4+ atau server Apache/MySQL lainnya
- **PHP** 8.0+
- **MySQL** 8.0+
- **Browser** modern (Chrome, Firefox, Safari, Edge)

### 🚀 Installation

1. **Clone Repository**

   ```bash
   git clone https://github.com/AlRafi004/CRUD-Ulasan-Canva.git
   cd CRUD-Ulasan-Canva
   ```

2. **Setup XAMPP**

   - Jalankan Apache dan MySQL di XAMPP Control Panel
   - Pastikan port 80 (Apache) dan 3306 (MySQL) tidak bentrok

3. **Import Database**

   ```sql
   -- Buka phpMyAdmin (http://localhost/phpmyadmin)
   -- Buat database baru: ulasan_canva
   -- Import file: ulasan_canva.sql
   ```

4. **Configure Database**

   ```php
   // File: backend/admin/assets/inc/config.php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "ulasan_canva";
   ```

5. **Deploy ke XAMPP**

   ```bash
   # Copy project ke htdocs
   cp -r CRUD-Ulasan-Canva/ C:/xampp/htdocs/
   ```

6. **Access Application**
   - **Homepage**: `http://localhost/CRUD-Ulasan-Canva/`
   - **Admin Panel**: `http://localhost/CRUD-Ulasan-Canva/backend/admin/`

---

## 🔧 Fitur CRUD Detail

### 📖 Read Operations

- **View All Reviews**: Daftar semua ulasan dengan pagination (10 per halaman)
- **View Single Review**: Detail lengkap ulasan individual
- **Search & Filter**: Pencarian berdasarkan nama, konten, atau rating
- **Analytics Dashboard**: Statistik sentimen dan rating

### ➕ Create Operations

- **Add New Review**: Form tambah ulasan baru dengan validasi
- **Auto Sentiment Detection**: Analisis sentimen otomatis berdasarkan konten
- **Input Validation**: Validasi rating (1-5), nama pengguna, dan konten

### ✏️ Update Operations

- **Edit Review**: Modifikasi semua field ulasan
- **Update Sentiment**: Re-analisis sentimen setelah edit konten
- **Form Pre-fill**: Auto-populate form dengan data existing

### 🗑️ Delete Operations

- **Soft Delete**: Konfirmasi sebelum penghapusan permanen
- **Bulk Delete**: Hapus multiple ulasan sekaligus
- **Secure Deletion**: Validasi session dan permission

### 📤 Export Operations

- **Single Export**: Export detail ulasan individual (TXT format)
- **Bulk Export**: Export semua data dengan statistik komprehensif
- **Formatted Output**: Export terstruktur dengan metadata lengkap

---

## 🐛 Troubleshooting

### Common Issues & Solutions

#### 1. Database Connection Error

```
Error: Connection failed: Access denied for user 'root'@'localhost'
```

**Solution**:

- Pastikan MySQL service running di XAMPP
- Check username/password di `config.php`
- Restart Apache dan MySQL

#### 2. File Not Found (404)

```
Error: The requested URL was not found on this server
```

**Solution**:

- Pastikan project di folder `htdocs`
- Check Apache virtual host configuration
- Verify file permissions

#### 3. Session Issues

```
Error: Headers already sent
```

**Solution**:

- Pastikan tidak ada output sebelum `session_start()`
- Check BOM di file PHP
- Remove whitespace sebelum `<?php`

#### 4. CSS/JS Not Loading

```
Error: Failed to load resource: net::ERR_FILE_NOT_FOUND
```

**Solution**:

- Check relative path di HTML
- Verify asset files exist
- Clear browser cache

### 🔧 Debug Mode

```php
// Enable error reporting for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
```

---

## 🤝 Contributing

### Development Workflow

1. **Fork Repository**

   ```bash
   git fork https://github.com/AlRafi004/CRUD-Ulasan-Canva.git
   ```

2. **Create Feature Branch**

   ```bash
   git checkout -b feature/nama-fitur-baru
   ```

3. **Commit Changes**

   ```bash
   git add .
   git commit -m "feat: add new feature description"
   ```

4. **Push & Pull Request**
   ```bash
   git push origin feature/nama-fitur-baru
   # Create Pull Request di GitHub
   ```

### Code Review Checklist

- [ ] Code follows PSR-12 standards
- [ ] All functions have proper documentation
- [ ] Security best practices implemented
- [ ] Responsive design tested
- [ ] No console errors in browser
- [ ] Database queries use prepared statements
- [ ] Error handling implemented

---

## 👨‍💻 Author

M. Hadianur Al Rafi

---
