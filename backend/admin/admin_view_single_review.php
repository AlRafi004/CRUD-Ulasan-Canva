<!-- Program ini adalah halaman untuk melihat detail komentar berdasarkan ID komentar yang diberikan sebagai parameter. 
Dengan demikian, halaman ini memberikan admin akses untuk melihat detail komentar berdasarkan ID komentar yang dipilih, 
termasuk informasi seperti nama pengguna, skor, tanggal, konten komentar, dan label.-->

<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Detail Ulasan Canva - Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="MartDevelopers" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>

<style>
/* Header Navigation */
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

/* Content Styling */
.main-content {
    min-height: calc(100vh - 60px - 200px);
    padding: 30px 50px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.page-header {
    background: linear-gradient(135deg, #7d2ae8 0%, #5a1fb3 100%);
    color: white;
    padding: 30px;
    border-radius: 15px;
    margin-bottom: 30px;
    box-shadow: 0 8px 25px rgba(125, 42, 232, 0.3);
}

.page-header h2 {
    margin: 0;
    font-family: "Rubik", sans-serif;
    font-weight: bold;
}

.page-header p {
    margin: 10px 0 0 0;
    opacity: 0.9;
}

/* Review Detail Card */
.review-detail-card {
    background: white;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.review-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #e9ecef;
}

.reviewer-info h3 {
    margin: 0;
    color: #7d2ae8;
    font-family: "Rubik", sans-serif;
    font-weight: bold;
}

.reviewer-info p {
    margin: 5px 0 0 0;
    color: #6c757d;
}

.rating-display {
    text-align: right;
}

.stars {
    font-size: 24px;
    color: #ff6900;
    margin-bottom: 5px;
}

.rating-text {
    font-size: 18px;
    font-weight: bold;
    color: #7d2ae8;
}

/* Review Content */
.review-content {
    margin-bottom: 30px;
}

.review-content h4 {
    color: #495057;
    margin-bottom: 15px;
    font-family: "Rubik", sans-serif;
}

.review-text {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
    border-left: 4px solid #7d2ae8;
    font-size: 16px;
    line-height: 1.6;
    color: #495057;
}

/* Review Meta */
.review-meta {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.meta-item {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    border: 1px solid #dee2e6;
}

.meta-item i {
    font-size: 24px;
    color: #7d2ae8;
    margin-bottom: 10px;
}

.meta-item h5 {
    margin: 0 0 5px 0;
    color: #495057;
    font-family: "Rubik", sans-serif;
}

.meta-item p {
    margin: 0;
    color: #6c757d;
    font-weight: bold;
}

/* Sentiment Badge */
.sentiment-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: bold;
    font-size: 16px;
}

.sentiment-positive {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
}

.sentiment-negative {
    background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
    color: white;
}

.sentiment-neutral {
    background: linear-gradient(135deg, #6c757d 0%, #adb5bd 100%);
    color: white;
}

/* Action Buttons */
.action-buttons {
    text-align: center;
    margin-top: 30px;
}

.crud-buttons {
    margin-bottom: 20px;
}

.btn-crud {
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    min-width: 150px;
    justify-content: center;
}

.btn-edit {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
    box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
}

.btn-edit:hover {
    background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(32, 201, 151, 0.4);
    color: white;
    text-decoration: none;
}

.btn-delete {
    background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
    color: white;
    box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
}

.btn-delete:hover {
    background: linear-gradient(135deg, #c82333 0%, #e0761c 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(220, 53, 69, 0.4);
    color: white;
    text-decoration: none;
}

.btn-add {
    background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);
    color: white;
    box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
}

.btn-add:hover {
    background: linear-gradient(135deg, #0056b3 0%, #520dc2 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0, 123, 255, 0.4);
    color: white;
    text-decoration: none;
}

.btn-export {
    background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
    color: #212529;
    box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3);
}

.btn-export:hover {
    background: linear-gradient(135deg, #e0a800 0%, #e0761c 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(255, 193, 7, 0.4);
    color: #212529;
    text-decoration: none;
}

.btn-back {
    background: linear-gradient(135deg, #7d2ae8 0%, #5a1fb3 100%);
    color: white;
    padding: 12px 30px;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.btn-back:hover {
    background: linear-gradient(135deg, #00c4cc 0%, #008a94 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0, 196, 204, 0.4);
    color: white;
    text-decoration: none;
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

/* Responsive */
@media (max-width: 768px) {
    .main-content {
        padding: 20px;
    }
    
    .review-detail-card {
        padding: 20px;
    }
    
    .review-header {
        flex-direction: column;
        text-align: center;
    }
    
    .rating-display {
        text-align: center;
        margin-top: 15px;
    }
    
    .review-meta {
        grid-template-columns: 1fr;
    }
    
    .footer-content {
        grid-template-columns: 1fr;
        padding: 0 20px;
    }
    
    .footer-bottom-content {
        flex-direction: column;
        gap: 15px;
        padding: 0 20px;
    }
    
    #nav-menu-container {
        padding: 0 20px;
    }
    
    .crud-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-crud {
        width: 100%;
        max-width: 250px;
        margin-bottom: 10px;
    }
}
</style>

<body style="margin:0; padding:0;">

    <!-- Header Area Starts -->
    <header>
        <nav id="nav-menu-container">
            <div class="tw-pict-container">
                <a href="#" style="text-decoration: none;">
                    <h3 style="color: white; margin: 0; font-weight: bold;">🎨 ULASAN CANVA</h3>
                </a>
            </div>
            <ul class="nav-menu">
                <li><a href="../../index.php"><i class="fas fa-home"></i> Beranda</a></li>
                <li class="menu-active"><a href="admin_view_reviews.php"><i class="fas fa-user-shield"></i> Admin Panel</a></li>
                <li><a href="his_admin_logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
    </header>
    <!-- Header Area End -->

    <!-- Main Content -->
    <div class="main-content">
        <!--Get Details Of A Single Comment And Display Them Here-->
        <?php
            $id=$_GET['id'];
            $ret="SELECT * FROM komentar WHERE id=?";
            $stmt= $mysqli->prepare($ret);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $res=$stmt->get_result();
            
            if($res->num_rows > 0) {
                $row=$res->fetch_object();
        ?>
        
        <div class="page-header">
            <h2><i class="fas fa-eye"></i> Detail Ulasan Canva</h2>
            <p>Informasi lengkap ulasan dari pengguna <?php echo $row->user_name;?></p>
        </div>

        <div class="review-detail-card">
            <!-- Review Header -->
            <div class="review-header">
                <div class="reviewer-info">
                    <h3><i class="fas fa-user"></i> <?php echo $row->user_name;?></h3>
                    <p><i class="fas fa-calendar"></i> <?php echo date("d F Y", strtotime($row->tgl));?></p>
                </div>
                <div class="rating-display">
                    <div class="stars">
                        <?php 
                        for($i = 1; $i <= 5; $i++) {
                            if($i <= $row->score) {
                                echo '<i class="fas fa-star"></i>';
                            } else {
                                echo '<i class="far fa-star"></i>';
                            }
                        }
                        ?>
                    </div>
                    <div class="rating-text"><?php echo $row->score;?>/5</div>
                </div>
            </div>

            <!-- Review Meta Info -->
            <div class="review-meta">
                <div class="meta-item">
                    <i class="fas fa-star"></i>
                    <h5>Rating</h5>
                    <p><?php echo $row->score;?> dari 5 bintang</p>
                </div>
                <div class="meta-item">
                    <i class="fas fa-calendar-alt"></i>
                    <h5>Tanggal Ulasan</h5>
                    <p><?php echo date("d M Y", strtotime($row->tgl));?></p>
                </div>
                <div class="meta-item">
                    <i class="fas fa-tags"></i>
                    <h5>Kategori Sentimen</h5>
                    <p>
                        <?php if($row->label == 'Positif') { ?>
                            <span class="sentiment-badge sentiment-positive">
                                <i class="fas fa-thumbs-up"></i> <?php echo $row->label;?>
                            </span>
                        <?php } elseif($row->label == 'Negatif') { ?>
                            <span class="sentiment-badge sentiment-negative">
                                <i class="fas fa-thumbs-down"></i> <?php echo $row->label;?>
                            </span>
                        <?php } else { ?>
                            <span class="sentiment-badge sentiment-neutral">
                                <i class="fas fa-minus"></i> Netral
                            </span>
                        <?php } ?>
                    </p>
                </div>
                <div class="meta-item">
                    <i class="fas fa-user"></i>
                    <h5>Reviewer</h5>
                    <p><?php echo $row->user_name;?></p>
                </div>
            </div>

            <!-- Review Content -->
            <div class="review-content">
                <h4><i class="fas fa-comment"></i> Isi Ulasan</h4>
                <div class="review-text">
                    <?php echo nl2br(htmlspecialchars($row->content));?>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <div class="crud-buttons" style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap; margin-bottom: 20px;">
                    <!-- Edit Button -->
                    <a href="admin_edit_review.php?id=<?php echo $row->id;?>" class="btn-crud btn-edit">
                        <i class="fas fa-edit"></i> Edit Ulasan
                    </a>
                    
                    <!-- Delete Button -->
                    <a href="#" onclick="confirmDelete(<?php echo $row->id;?>)" class="btn-crud btn-delete">
                        <i class="fas fa-trash-alt"></i> Hapus Ulasan
                    </a>
                    
                    <!-- Add New Review Button -->
                    <a href="admin_add_new_review.php" class="btn-crud btn-add">
                        <i class="fas fa-plus"></i> Tambah Ulasan Baru
                    </a>
                    
                    <!-- Export Button -->
                    <a href="admin_export_review.php?id=<?php echo $row->id;?>" class="btn-crud btn-export">
                        <i class="fas fa-download"></i> Export Data
                    </a>
                </div>
                
                <a href="admin_view_reviews.php" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Ulasan
                </a>
            </div>
        </div>
        
        <?php 
            } else {
        ?>
        <div class="page-header">
            <h2><i class="fas fa-exclamation-triangle"></i> Ulasan Tidak Ditemukan</h2>
            <p>Ulasan yang Anda cari tidak dapat ditemukan dalam database</p>
        </div>

        <div class="review-detail-card">
            <div style="text-align: center; padding: 40px;">
                <i class="fas fa-search" style="font-size: 64px; color: #dee2e6; margin-bottom: 20px;"></i>
                <h4 style="color: #6c757d; margin-bottom: 15px;">Data Tidak Ditemukan</h4>
                <p style="color: #adb5bd; margin-bottom: 30px;">
                    Ulasan dengan ID yang diminta tidak ada dalam database atau mungkin telah dihapus.
                </p>
                <a href="admin_view_reviews.php" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Ulasan
                </a>
            </div>
        </div>
        <?php } ?>
    </div>

    <!-- Footer Area Start -->
    <footer class="footer-area">
        <div class="footer-content">
            <div class="footer-section">
                <h3>🎨 ULASAN CANVA</h3>
                <p>Platform ulasan terdepan untuk mengetahui pengalaman pengguna Canva. Kami menghadirkan analisis sentimen yang akurat untuk membantu Anda memahami kualitas layanan Canva berdasarkan feedback pengguna sesungguhnya.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="../../index.php">Beranda</a></li>
                    <li><a href="admin_view_reviews.php">Admin Panel</a></li>
                    <li><a href="his_admin_logout.php">Logout</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Layanan</h4>
                <ul>
                    <li><a href="#">Analisis Sentimen</a></li>
                    <li><a href="#">Review Management</a></li>
                    <li><a href="#">Data Analytics</a></li>
                    <li><a href="#">Support 24/7</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Kontak Kami</h4>
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
                <p>&copy; 2024 ULASAN CANVA. All rights reserved.</p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Support</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- App js -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    
    <!-- CRUD Functions -->
    <script>
    function confirmDelete(reviewId) {
        if (confirm('Apakah Anda yakin ingin menghapus ulasan ini? Tindakan ini tidak dapat dibatalkan.')) {
            // Redirect to delete page
            window.location.href = 'admin_delete_review.php?id=' + reviewId;
        }
    }
    
    // Add smooth scroll for better UX
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    
    // Show loading state when clicking CRUD buttons
    document.querySelectorAll('.btn-crud').forEach(button => {
        button.addEventListener('click', function() {
            if (!this.classList.contains('btn-delete')) {
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
            }
        });
    });
    </script>

</body>

</html>
            

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>


</html>
</html>
</html>