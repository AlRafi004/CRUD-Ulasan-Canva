<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];

// Handle form submission
if(isset($_POST['update_review'])) {
    $id = $_POST['id'];
    $user_name = $_POST['user_name'];
    $score = $_POST['score'];
    $content = $_POST['content'];
    $label = $_POST['label'];
    $tgl = $_POST['tgl'];
    
    $query = "UPDATE komentar SET user_name=?, score=?, content=?, label=?, tgl=? WHERE id=?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('sisssi', $user_name, $score, $content, $label, $tgl, $id);
    
    if($stmt->execute()) {
        $success = "Ulasan berhasil diupdate!";
        // Redirect after 2 seconds
        header("refresh:2;url=admin_view_single_review.php?id=$id");
    } else {
        $error = "Gagal mengupdate ulasan!";
    }
}

// Get review data
$id = $_GET['id'];
$ret = "SELECT * FROM komentar WHERE id=?";
$stmt = $mysqli->prepare($ret);
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();

if($res->num_rows > 0) {
    $row = $res->fetch_object();
} else {
    header("Location: admin_view_reviews.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Edit Ulasan Canva - Admin Panel</title>
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
    background: linear-gradient(135deg, #7d2ae8 0%, #5a1fb3 100%);
    color: white;
    padding: 30px;
    border-radius: 15px;
    margin-bottom: 30px;
    box-shadow: 0 8px 25px rgba(125, 42, 232, 0.3);
}

.edit-form-card {
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
    border-color: #7d2ae8;
    box-shadow: 0 0 0 3px rgba(125, 42, 232, 0.1);
    outline: none;
}

textarea.form-control {
    min-height: 120px;
    resize: vertical;
}

.btn-update {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
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

.btn-update:hover {
    background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(32, 201, 151, 0.4);
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

@media (max-width: 768px) {
    .main-content {
        padding: 20px;
    }
    
    .edit-form-card {
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
            <h2><i class="fas fa-edit"></i> Edit Ulasan Canva</h2>
            <p>Ubah informasi ulasan dari pengguna <?php echo $row->user_name;?></p>
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

        <div class="edit-form-card">
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="user_name"><i class="fas fa-user"></i> Nama Pengguna</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" 
                               value="<?php echo htmlspecialchars($row->user_name); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="score"><i class="fas fa-star"></i> Rating (1-5)</label>
                        <select class="form-control" id="score" name="score" required>
                            <option value="">Pilih Rating</option>
                            <?php for($i = 1; $i <= 5; $i++) { ?>
                            <option value="<?php echo $i; ?>" <?php echo ($row->score == $i) ? 'selected' : ''; ?>>
                                <?php echo $i; ?> Bintang
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="tgl"><i class="fas fa-calendar"></i> Tanggal Ulasan</label>
                        <input type="date" class="form-control" id="tgl" name="tgl" 
                               value="<?php echo $row->tgl; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="label"><i class="fas fa-tags"></i> Kategori Sentimen</label>
                        <select class="form-control" id="label" name="label" required>
                            <option value="">Pilih Sentimen</option>
                            <option value="Positif" <?php echo ($row->label == 'Positif') ? 'selected' : ''; ?>>
                                Positif
                            </option>
                            <option value="Negatif" <?php echo ($row->label == 'Negatif') ? 'selected' : ''; ?>>
                                Negatif
                            </option>
                            <option value="Netral" <?php echo ($row->label == 'Netral') ? 'selected' : ''; ?>>
                                Netral
                            </option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="content"><i class="fas fa-comment"></i> Isi Ulasan</label>
                    <textarea class="form-control" id="content" name="content" 
                              placeholder="Tulis ulasan di sini..." required><?php echo htmlspecialchars($row->content); ?></textarea>
                </div>
                
                <div style="text-align: center; margin-top: 30px;">
                    <button type="submit" name="update_review" class="btn-update">
                        <i class="fas fa-save"></i> Update Ulasan
                    </button>
                    <a href="admin_view_single_review.php?id=<?php echo $row->id; ?>" class="btn-cancel">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- App js -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

</body>

</html>
