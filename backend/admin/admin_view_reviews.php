<!-- Program ini adalah halaman admin untuk melihat dan mengelola semua ulasan Canva yang telah diberikan oleh pengguna. 
Halaman ini memberikan admin kemudahan dalam melihat daftar lengkap ulasan, mencari ulasan tertentu, 
dan mengakses detail setiap ulasan untuk pengelolaan yang lebih baik. -->

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
    <title>Manajemen Ulasan Canva - Admin Panel</title>
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

/* Alert Messages */
.alert {
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 25px;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 10px;
}

.alert-success {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-danger {
    background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
    color: #721c24;
    border: 1px solid #f5c6cb;
}

/* Action Header Buttons */
.action-header-buttons {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    border: 1px solid #e9ecef;
}

.stats-info {
    display: flex;
    align-items: center;
}

.stats-text {
    color: #6c757d;
    font-weight: 500;
    font-size: 14px;
}

.stats-text i {
    color: #7d2ae8;
    margin-right: 8px;
}

.header-crud-buttons {
    display: flex;
    gap: 12px;
}

.btn-header-add {
    background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
}

.btn-header-add:hover {
    background: linear-gradient(135deg, #0056b3 0%, #520dc2 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0, 123, 255, 0.4);
    color: white;
    text-decoration: none;
}

.btn-header-export {
    background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
    color: #212529;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3);
}

.btn-header-export:hover {
    background: linear-gradient(135deg, #e0a800 0%, #e0761c 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(255, 193, 7, 0.4);
    color: #212529;
    text-decoration: none;
}

/* Table Styling */
.table-container {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.table {
    border-radius: 10px;
    overflow: hidden;
}

.table thead th {
    background: linear-gradient(135deg, #7d2ae8 0%, #5a1fb3 100%);
    color: white;
    border: none;
    font-weight: bold;
    padding: 15px;
}

.table tbody td {
    padding: 15px;
    vertical-align: middle;
    border-color: #e9ecef;
}

.table tbody tr:hover {
    background-color: rgba(125, 42, 232, 0.05);
}

/* Badge Styling */
.status-positive {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    border: none;
    padding: 8px 12px;
}

.status-negative {
    background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
    border: none;
    padding: 8px 12px;
}

.status-neutral {
    background: linear-gradient(135deg, #6c757d 0%, #adb5bd 100%);
    border: none;
    padding: 8px 12px;
}

.badge-info {
    background: linear-gradient(135deg, #00c4cc 0%, #008a94 100%);
    border: none;
    padding: 8px 12px;
    text-decoration: none;
    color: white;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.badge-info:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 196, 204, 0.4);
    color: white;
    text-decoration: none;
}

/* Inline Action Buttons */
.action-buttons-inline {
    display: flex;
    gap: 5px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-action {
    padding: 8px 10px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 12px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 32px;
    height: 32px;
}

.btn-view {
    background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
    color: white;
}

.btn-view:hover {
    background: linear-gradient(135deg, #138496 0%, #0f6674 100%);
    transform: translateY(-1px);
    color: white;
    text-decoration: none;
}

.btn-edit {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
}

.btn-edit:hover {
    background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);
    transform: translateY(-1px);
    color: white;
    text-decoration: none;
}

.btn-delete {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: white;
}

.btn-delete:hover {
    background: linear-gradient(135deg, #c82333 0%, #a71e2a 100%);
    transform: translateY(-1px);
    color: white;
    text-decoration: none;
}

.btn-export {
    background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
    color: #212529;
}

.btn-export:hover {
    background: linear-gradient(135deg, #e0a800 0%, #d39e00 100%);
    transform: translateY(-1px);
    color: #212529;
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

/* Pagination Styling */
.pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 30px;
}

.pagination {
    display: flex;
    gap: 5px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.pagination li {
    margin: 0;
}

.pagination li a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #7d2ae8 0%, #5a1fb3 100%);
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.pagination li a:hover {
    background: linear-gradient(135deg, #00c4cc 0%, #008a94 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 196, 204, 0.4);
    color: white;
    text-decoration: none;
}

.pagination li.active a {
    background: linear-gradient(135deg, #00c4cc 0%, #008a94 100%);
    border-color: #00c4cc;
    box-shadow: 0 4px 12px rgba(0, 196, 204, 0.5);
}

.pagination li.disabled a {
    background: #6c757d;
    color: #adb5bd;
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
}

.pagination li.disabled a:hover {
    background: #6c757d;
    transform: none;
    box-shadow: none;
}

.results-info {
    text-align: center;
    margin-top: 20px;
    color: #6c757d;
    font-size: 14px;
}

/* Responsive */
@media (max-width: 768px) {
    .main-content {
        padding: 20px;
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
    
    .action-header-buttons {
        flex-direction: column;
        gap: 15px;
        align-items: stretch;
    }
    
    .header-crud-buttons {
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .btn-header-add,
    .btn-header-export {
        flex: 1;
        min-width: 150px;
        justify-content: center;
    }
    
    .stats-info {
        text-align: center;
    }
    
    .action-buttons-inline {
        flex-direction: column;
        gap: 8px;
    }
    
    .btn-action {
        width: 100%;
        min-width: auto;
        padding: 10px;
        font-size: 14px;
    }
    
    .table-responsive {
        font-size: 12px;
    }
    
    .table tbody td {
        padding: 10px 8px;
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
        <?php
            // Pagination variables - Define early for stats display
            $limit = 10; // Number of records per page
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $page = max(1, $page); // Ensure page is at least 1
            $start = ($page - 1) * $limit;
            
            // Get total records
            $total_query = "SELECT COUNT(*) as total FROM komentar";
            $total_stmt = $mysqli->prepare($total_query);
            $total_stmt->execute();
            $total_result = $total_stmt->get_result();
            $total_row = $total_result->fetch_assoc();
            $total_records = (int)$total_row['total'];
            $total_pages = ($total_records > 0) ? ceil($total_records / $limit) : 1;
            
            // Adjust page if it's beyond available pages
            if($page > $total_pages && $total_pages > 0) {
                $page = $total_pages;
                $start = ($page - 1) * $limit;
            }
            
            // Debug info (uncomment for troubleshooting)
            // echo "<!-- Debug: total_records=$total_records, page=$page, total_pages=$total_pages, start=$start, limit=$limit -->";
        ?>
        
        <div class="page-header">
            <h2><i class="fas fa-star"></i> Manajemen Ulasan Canva</h2>
            <p>Kelola dan pantau semua ulasan pengguna tentang platform Canva</p>
        </div> 

        <!-- Action Buttons -->
        <div class="action-header-buttons" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <div class="stats-info">
                <span class="stats-text">
                    <i class="fas fa-database"></i> 
                    Total: <?php echo $total_records; ?> ulasan
                    <?php if($total_records > 0) { ?>
                     | Halaman: <?php echo $page; ?> dari <?php echo $total_pages; ?>
                    <?php } ?>
                </span>
            </div>
            <div class="header-crud-buttons">
                <a href="admin_add_new_review.php" class="btn-header-add">
                    <i class="fas fa-plus"></i> Tambah Ulasan Baru
                </a>
                <a href="#" onclick="exportAllReviews()" class="btn-header-export">
                    <i class="fas fa-download"></i> Export Semua Data
                </a>
            </div>
        </div>

        <!-- Success/Error Messages -->
        <?php if(isset($_SESSION['success_message'])) { ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> <?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
        </div>
        <?php } ?>

        <?php if(isset($_SESSION['error_message'])) { ?>
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i> <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
        </div>
        <?php } ?>

        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Reviewer</th>
                            <th>Rating</th>
                            <th>Tanggal Ulasan</th>
                            <th>Isi Ulasan</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Get records for current page
                            $ret="SELECT * FROM komentar ORDER BY id LIMIT ?, ?"; 
                            $stmt= $mysqli->prepare($ret);
                            $stmt->bind_param('ii', $start, $limit);
                            $stmt->execute();
                            $res=$stmt->get_result();
                            $cnt = $start + 1;
                            
                            if($res && $res->num_rows > 0) {
                                while($row=$res->fetch_object()) {
                        ?>
                        <tr>
                            <td><?php echo $cnt;?></td>
                            <td><strong><?php echo $row->user_name;?></strong></td>
                            <td>
                                <span style="color: #ff6900; font-weight: bold;">
                                    <?php 
                                    for($i = 1; $i <= 5; $i++) {
                                        if($i <= $row->score) {
                                            echo '<i class="fas fa-star"></i>';
                                        } else {
                                            echo '<i class="far fa-star"></i>';
                                        }
                                    }
                                    ?>
                                    (<?php echo $row->score;?>/5)
                                </span>
                            </td>
                            <td><?php echo date('d M Y', strtotime($row->tgl));?></td>
                            <td style="max-width: 300px;">
                                <div style="max-height: 60px; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo substr($row->content, 0, 100) . (strlen($row->content) > 100 ? '...' : '');?>
                                </div>
                            </td>
                            <td>
                                <?php if($row->label == 'Positif') { ?>
                                    <span class="badge status-positive">
                                        <i class="fas fa-thumbs-up"></i> <?php echo $row->label;?>
                                    </span>
                                <?php } elseif($row->label == 'Negatif') { ?>
                                    <span class="badge status-negative">
                                        <i class="fas fa-thumbs-down"></i> <?php echo $row->label;?>
                                    </span>
                                <?php } else { ?>
                                    <span class="badge status-neutral">
                                        <i class="fas fa-minus"></i> Netral
                                    </span>
                                <?php } ?>
                            </td>
                            <td>
                                <div class="action-buttons-inline">
                                    <a href="admin_view_single_review.php?id=<?php echo $row->id;?>&&user_name=<?php echo $row->user_name;?>" 
                                       class="btn-action btn-view" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="admin_edit_review.php?id=<?php echo $row->id;?>" 
                                       class="btn-action btn-edit" title="Edit Ulasan">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" onclick="confirmQuickDelete(<?php echo $row->id;?>, '<?php echo addslashes($row->user_name);?>')" 
                                       class="btn-action btn-delete" title="Hapus Ulasan">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <a href="admin_export_review.php?id=<?php echo $row->id;?>" 
                                       class="btn-action btn-export" title="Export Data">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php 
                                $cnt++;
                                }
                            } else {
                        ?>
                        <tr>
                            <td colspan="7" class="text-center" style="padding: 40px;">
                                <i class="fas fa-inbox" style="font-size: 48px; color: #dee2e6; margin-bottom: 15px;"></i>
                                <h5 style="color: #6c757d;">Belum Ada Ulasan</h5>
                                <p style="color: #adb5bd;">Belum ada ulasan yang tersedia untuk ditampilkan.</p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <?php if($total_pages > 1) { ?>
            <div class="pagination-container">
                <ul class="pagination">
                    <!-- Previous Button -->
                    <li class="<?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                        <a href="<?php echo ($page <= 1) ? '#' : '?page=' . ($page - 1); ?>">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    
                    <?php
                    // Show page numbers
                    $start_page = max(1, $page - 2);
                    $end_page = min($total_pages, $page + 2);
                    
                    // Show first page if not in range
                    if($start_page > 1) {
                        echo '<li><a href="?page=1">1</a></li>';
                        if($start_page > 2) {
                            echo '<li class="disabled"><a href="#">...</a></li>';
                        }
                    }
                    
                    // Show page numbers in range
                    for($i = $start_page; $i <= $end_page; $i++) {
                        $active_class = ($i == $page) ? 'active' : '';
                        echo '<li class="' . $active_class . '"><a href="?page=' . $i . '">' . $i . '</a></li>';
                    }
                    
                    // Show last page if not in range
                    if($end_page < $total_pages) {
                        if($end_page < $total_pages - 1) {
                            echo '<li class="disabled"><a href="#">...</a></li>';
                        }
                        echo '<li><a href="?page=' . $total_pages . '">' . $total_pages . '</a></li>';
                    }
                    ?>
                    
                    <!-- Next Button -->
                    <li class="<?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                        <a href="<?php echo ($page >= $total_pages) ? '#' : '?page=' . ($page + 1); ?>">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Results Info -->
            <div class="results-info">
                Menampilkan <?php echo (($page - 1) * $limit + 1); ?> - <?php echo min($page * $limit, $total_records); ?> 
                dari <?php echo $total_records; ?> ulasan (Halaman <?php echo $page; ?> dari <?php echo $total_pages; ?>)
            </div>
            <?php } ?>
        </div>
    </div>

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
                    <li><a href="../../index.php"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="admin_view_reviews.php"><i class="fas fa-user-shield"></i> Panel Admin</a></li>
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
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    
    <script>
    // Export all reviews function
    function exportAllReviews() {
        if (confirm('Apakah Anda ingin mengekspor semua data ulasan? File akan diunduh dalam format .txt')) {
            window.location.href = 'admin_export_all_reviews.php';
        }
    }
    
    // Quick delete function
    function confirmQuickDelete(reviewId, userName) {
        if (confirm('Apakah Anda yakin ingin menghapus ulasan dari "' + userName + '"?\n\nTindakan ini tidak dapat dibatalkan.')) {
            // Show loading state
            const deleteBtn = event.target.closest('.btn-delete');
            const originalContent = deleteBtn.innerHTML;
            deleteBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            
            // Redirect to delete page
            window.location.href = 'admin_delete_review.php?id=' + reviewId;
        }
    }
    
    // Add loading state to header buttons
    document.querySelectorAll('.btn-header-add, .btn-header-export').forEach(button => {
        button.addEventListener('click', function(e) {
            if (!this.onclick) { // Only for non-onclick buttons
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
                
                // Restore text after 3 seconds if page doesn't change
                setTimeout(() => {
                    this.innerHTML = originalText;
                }, 3000);
            }
        });
    });
    
    // Add loading state to action buttons
    document.querySelectorAll('.btn-view, .btn-edit, .btn-export').forEach(button => {
        button.addEventListener('click', function(e) {
            const originalContent = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            
            // Restore content after 3 seconds if page doesn't change
            setTimeout(() => {
                this.innerHTML = originalContent;
            }, 3000);
        });
    });
    
    // Smooth scroll for pagination
    document.querySelectorAll('.pagination a').forEach(link => {
        link.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
    </script>

</body>

</html>

