<!-- Program ini adalah halaman web untuk situs ulasan Canva. Halaman ini secara keseluruhan berfungsi 
sebagai landing page untuk situs ulasan Canva, dengan navigasi menu, deskripsi konten, dan desain yang menarik untuk pengguna.-->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Ulasan canva</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/logo.jpg" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
</head>

<style>
.desc-home {
    text-align: justify;
    font-family: "Rubik", sans-serif;
    width: 55%;
    margin-left: 50px;
    color: #2c3e50;
    font-size: 25px;
    margin-top: -300px;
    margin-bottom: 0;
    text-shadow: 1px 1px 2px rgba(255,255,255,0.8);
    background-color: rgba(255,255,255,0.9);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.title-desc-home {
    color: #7d2ae8;
    text-align: justify;
    font-family: "Rubik", sans-serif;
    font-size:60px;
    font-style: bold;
    padding-bottom: 20px;
    font-weight: bold;
    text-shadow: 1px 1px 2px rgba(255,255,255,0.5);
    letter-spacing: -1px;
    line-height: 1.2;
    word-spacing: -3px;
}

#nav-menu-container {
    display: flex;
    text-align: center;
    align-items: center;
    background-color: #282e34;
    height: 60px;
    width: 100%;
    justify-content: space-between;
    padding: 0 50px;
}

.nav-menu {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    gap: 15px;
}

.nav-menu li {
    margin: 0;
}

.nav-menu li a {
    background: linear-gradient(135deg, #7d2ae8 0%, #5a1fb3 100%);
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    padding: 12px 20px;
    border-radius: 8px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    border: 2px solid transparent;
    box-shadow: 0 4px 8px rgba(125, 42, 232, 0.3);
}

.nav-menu li a:hover {
    background: linear-gradient(135deg, #00c4cc 0%, #008a94 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0, 196, 204, 0.4);
    border-color: #00c4cc;
}

.nav-menu li.menu-active a {
    background: linear-gradient(135deg, #00c4cc 0%, #008a94 100%);
    border-color: #00c4cc;
    box-shadow: 0 4px 12px rgba(0, 196, 204, 0.5);
}

.tw-pict-container {
    display: flex;
    align-items: center;
}

.banner-area {
    background-image: url('assets/images/banner-bg.png');
    background-size: auto 100%;
    background-position: 100% center;
    background-repeat: no-repeat;
    height: 100vh;
}

/* Footer Styles */
.footer-area {
    background: linear-gradient(135deg, #282e34 0%, #1a1f24 100%);
    color: #ffffff;
    padding: 60px 0 0 0;
    margin-top: 50px;
}

.footer-content {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr;
    gap: 20px;
    width: 100%;
    margin: 0;
    padding: 0 40px;
}

.footer-section h3 {
    color: #7d2ae8;
    font-size: 24px;
    margin-bottom: 20px;
    font-weight: bold;
}

.footer-section h4 {
    color: #00c4cc;
    font-size: 18px;
    margin-bottom: 20px;
    font-weight: bold;
}

.footer-section p {
    color: #b8c2cc;
    line-height: 1.6;
    margin-bottom: 20px;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: #b8c2cc;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-section ul li a:hover {
    color: #7d2ae8;
}

.social-links {
    display: flex;
    gap: 15px;
}

.social-links a {
    background: #7d2ae8;
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-links a:hover {
    background: #00c4cc;
    transform: translateY(-2px);
}

.contact-info p {
    margin-bottom: 12px;
}

.contact-info i {
    color: #7d2ae8;
    margin-right: 10px;
    width: 16px;
}

.footer-bottom {
    background: #1a1f24;
    padding: 20px 0;
    margin-top: 40px;
    border-top: 1px solid #333;
}

.footer-bottom-content {
    width: 100%;
    margin: 0;
    padding: 0 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.footer-bottom p {
    color: #b8c2cc;
    margin: 0;
}

.footer-bottom-links {
    display: flex;
    gap: 20px;
}

.footer-bottom-links a {
    color: #b8c2cc;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s ease;
}

.footer-bottom-links a:hover {
    color: #7d2ae8;
}

@media (max-width: 768px) {
    .footer-content {
        grid-template-columns: 1fr;
        padding: 0 20px;
    }
    
    .footer-bottom-content {
        flex-direction: column;
        gap: 15px;
        padding: 0 20px;
    }
}

</style>

<body style="height:100%; margin:0; padding:0;">
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
    <header>
        <div id="home">
            <div>
                <nav id="nav-menu-container">
                    <div class="tw-pict-container">
                        <a href="#" style="text-decoration: none;">
                            <h3 style="color: white; margin: 0; font-weight: bold;">🎨 ULASAN CANVA</h3>
                        </a>
                    </div>
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="index.php"><i class="fas fa-home"></i> Beranda</a></li>
                        <li><a href="backend/admin/index.php"><i class="fas fa-user-shield"></i> Panel Admin</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Header Area End -->

    <!-- Banner Area Starts -->
    <section class="banner-area">
        <div class="desc-home">
            <div>

                <p class="title-desc-home">Satu Ulasan Anda Sangat Berarti Bagi Kami.</p>

                <p>Selamat datang di web ulasan Canva, sumber informasi terpercaya untuk semua hal 
                    tentang platform desain grafis online yang inovatif. Di sini, 
                    Anda akan menemukan ulasan mendalam tentang fitur-fitur Canva yang memukau, 
                    dari desain grafis yang profesional hingga pembuatan konten media sosial yang menarik. 
                    </p>

            </div>
        </div>
    </section>

    <!-- Footer Area Starts -->
    <footer class="footer-area">
        <div class="footer-content">
            <div class="footer-section">
                <h3>🎨 ULASAN CANVA</h3>
                <p>Platform terpercaya untuk review dan ulasan mendalam tentang fitur-fitur Canva yang memukau.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h4>Menu Utama</h4>
                <ul>
                    <li><a href="index.php"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="backend/admin/index.php"><i class="fas fa-user-shield"></i> Panel Admin</a></li>
                    <li><a href="#"><i class="fas fa-star"></i> Ulasan Terbaru</a></li>
                    <li><a href="#"><i class="fas fa-info-circle"></i> Tentang Kami</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Fitur Canva</h4>
                <ul>
                    <li><a href="#"><i class="fas fa-palette"></i> Desain Grafis</a></li>
                    <li><a href="#"><i class="fas fa-camera"></i> Media Sosial</a></li>
                    <li><a href="#"><i class="fas fa-file-alt"></i> Presentasi</a></li>
                    <li><a href="#"><i class="fas fa-print"></i> Cetak & Print</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Kontak Info</h4>
                <div class="contact-info">
                    <p><i class="fas fa-envelope"></i> info@ulasancanva.com</p>
                    <p><i class="fas fa-phone"></i> +62 123 456 789</p>
                    <p><i class="fas fa-map-marker-alt"></i> Jakarta, Indonesia</p>
                    <p><i class="fas fa-clock"></i> 24/7 Online Support</p>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <p>&copy; 2025 Ulasan Canva. All rights reserved. | Developed by M. Hadianur Al Rafi</p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/vendor/superfish.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>