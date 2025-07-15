<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];

// Handle form submission
if(isset($_POST['add_review'])) {
    $user_name = $_POST['user_name'];
    $score = $_POST['score'];
    $content = $_POST['content'];
    $label = $_POST['label'];
    $tgl = $_POST['tgl'];
    
    $query = "INSERT INTO komentar (user_name, score, content, label, tgl) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('sisss', $user_name, $score, $content, $label, $tgl);
    
    if($stmt->execute()) {
        $success = "Ulasan baru berhasil ditambahkan!";
        $new_id = $mysqli->insert_id;
        // Redirect after 2 seconds
        header("refresh:2;url=admin_view_single_review.php?id=$new_id");
    } else {
        $error = "Gagal menambahkan ulasan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Tambah Ulasan Canva - Admin Panel</title>
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

/* Content Styling */
.main-content {
    min-height: calc(100vh - 60px);
    padding: 30px 50px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.page-header {
    background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);
    color: white;
    padding: 30px;
    border-radius: 15px;
    margin-bottom: 30px;
    box-shadow: 0 8px 25px rgba(0, 123, 255, 0.3);
}

.add-form-card {
    background: white;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    font-weight: bold;
    color: #495057;
    margin-bottom: 8px;
    display: block;
    font-family: "Rubik", sans-serif;
}

.form-control {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 16px;
    transition: all 0.3s ease;
    font-family: "Rubik", sans-serif;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
    outline: none;
}

textarea.form-control {
    min-height: 120px;
    resize: vertical;
}

.btn-add {
    background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.btn-add:hover {
    background: linear-gradient(135deg, #0056b3 0%, #520dc2 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0, 123, 255, 0.4);
}

.btn-cancel {
    background: linear-gradient(135deg, #6c757d 0%, #adb5bd 100%);
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    font-size: 16px;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-left: 15px;
}

.btn-cancel:hover {
    background: linear-gradient(135deg, #5a6268 0%, #95999c 100%);
    transform: translateY(-2px);
    color: white;
    text-decoration: none;
}

.alert {
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 25px;
    font-weight: bold;
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

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.help-text {
    font-size: 14px;
    color: #6c757d;
    margin-top: 5px;
}

@media (max-width: 768px) {
    .main-content {
        padding: 20px;
    }
    
    .add-form-card {
        padding: 20px;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    #nav-menu-container {
        padding: 0 20px;
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
        <div class="page-header">
            <h2><i class="fas fa-plus"></i> Tambah Ulasan Canva Baru</h2>
            <p>Buat ulasan baru untuk platform Canva</p>
        </div>

        <?php if(isset($success)) { ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> <?php echo $success; ?>
        </div>
        <?php } ?>

        <?php if(isset($error)) { ?>
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
        </div>
        <?php } ?>

        <div class="add-form-card">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="user_name"><i class="fas fa-user"></i> Nama Pengguna</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" 
                               placeholder="Masukkan nama pengguna" required>
                        <div class="help-text">Nama reviewer yang memberikan ulasan</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="score"><i class="fas fa-star"></i> Rating (1-5)</label>
                        <select class="form-control" id="score" name="score" required>
                            <option value="">Pilih Rating</option>
                            <option value="1">⭐ 1 Bintang (Sangat Buruk)</option>
                            <option value="2">⭐⭐ 2 Bintang (Buruk)</option>
                            <option value="3">⭐⭐⭐ 3 Bintang (Cukup)</option>
                            <option value="4">⭐⭐⭐⭐ 4 Bintang (Baik)</option>
                            <option value="5">⭐⭐⭐⭐⭐ 5 Bintang (Sangat Baik)</option>
                        </select>
                        <div class="help-text">Berikan rating sesuai kualitas pengalaman</div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="tgl"><i class="fas fa-calendar"></i> Tanggal Ulasan</label>
                        <input type="date" class="form-control" id="tgl" name="tgl" 
                               value="<?php echo date('Y-m-d'); ?>" required>
                        <div class="help-text">Tanggal ketika ulasan dibuat</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="label"><i class="fas fa-tags"></i> Kategori Sentimen</label>
                        <select class="form-control" id="label" name="label" required>
                            <option value="">Pilih Sentimen</option>
                            <option value="Positif">👍 Positif (Ulasan baik)</option>
                            <option value="Negatif">👎 Negatif (Ulasan buruk)</option>
                            <option value="Netral">🤝 Netral (Ulasan biasa)</option>
                        </select>
                        <div class="help-text">Kategori berdasarkan isi ulasan</div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="content"><i class="fas fa-comment"></i> Isi Ulasan</label>
                    <textarea class="form-control" id="content" name="content" 
                              placeholder="Tulis ulasan lengkap tentang pengalaman menggunakan Canva..." required></textarea>
                    <div class="help-text">Berikan review yang detail dan konstruktif</div>
                </div>
                
                <div style="text-align: center; margin-top: 30px;">
                    <button type="submit" name="add_review" class="btn-add">
                        <i class="fas fa-plus"></i> Tambah Ulasan
                    </button>
                    <a href="admin_view_reviews.php" class="btn-cancel">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- App js -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    
    <script>
    // Auto-set sentiment based on rating
    document.getElementById('score').addEventListener('change', function() {
        const rating = parseInt(this.value);
        const sentimentSelect = document.getElementById('label');
        
        if (rating >= 4) {
            sentimentSelect.value = 'Positif';
        } else if (rating >= 3) {
            sentimentSelect.value = 'Netral';
        } else if (rating >= 1) {
            sentimentSelect.value = 'Negatif';
        }
    });
    </script>

</body>

</html>
