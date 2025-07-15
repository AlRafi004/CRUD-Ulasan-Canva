<!-- Program ini adalah halaman login untuk administrator ulasan Canva. Halaman ini memastikan bahwa hanya admin yang memiliki kredensial 
yang valid yang dapat mengakses panel administrasi ulasan dengan aman.-->
<?php
    session_start();
    include('assets/inc/config.php');//get configuration file
    if(isset($_POST['admin_login']))
    {
        $ad_email=$_POST['ad_email'];
        $ad_pwd=sha1(md5($_POST['ad_pwd']));//double encrypt to increase security
        $stmt=$mysqli->prepare("SELECT ad_email ,ad_pwd , ad_id FROM his_admin WHERE ad_email=? AND ad_pwd=? ");//sql to log in user
        $stmt->bind_param('ss',$ad_email,$ad_pwd);//bind fetched parameters
        $stmt->execute();//execute bind
        $stmt -> bind_result($ad_email,$ad_pwd,$ad_id);//bind result
        $rs=$stmt->fetch();
        $_SESSION['ad_id']=$ad_id;//Assign session to admin id
        //$uip=$_SERVER['REMOTE_ADDR'];
        //$ldate=date('d/m/Y h:i:s', time());
        if($rs)
            {//if its sucessfull
                header("location:admin_view_reviews.php");
            }

        else
            {
            #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
                $err = "Access Denied Please Check Your Credentials";
            }
    }
?>
<!--End Login-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Ulasan Canva - Admin Panel</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <!--Load Sweet Alert Javascript-->

    <script src="assets/js/swal.js"></script>
    <!--Inject SWAL-->
    <?php if(isset($success)) {?>
    <!--This code for injecting an alert-->
    <script>
    setTimeout(function() {
            swal("Success", "<?php echo $success;?>", "success");
        },
        100);
    </script>

    <?php } ?>

    <?php if(isset($err)) {?>
    <!--This code for injecting an alert-->
    <script>
    setTimeout(function() {
            swal("Failed", "<?php echo $err;?>", "Failed");
        },
        100);
    </script>

    <?php } ?>

    <!-- Force Override Background -->
    <style>
        /* Background login dengan gambar bg-login */
        body.authentication-bg {
            background-image: url('assets/images/bg-login.jpg') !important;
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            min-height: 100vh !important;
        }
        
        /* Enhanced card styling untuk background gambar */
        .card {
            background: rgba(255, 255, 255, 0.95) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3) !important;
            border-radius: 12px !important;
            backdrop-filter: blur(10px) !important;
        }
        
        /* Admin text styling */
        .admin-text {
            color: #7d2ae8 !important;
            font-weight: bold !important;
        }
    </style>

</head>

<style>
.desc-home {
    text-align: left;
    width: 40%;
    margin-left: 50px;
    color: #fff;
    font-size: 30px;
    margin-top: -250px;
    margin-bottom: -6%;
    font-family: cursive;
}

.forgot-password-link:hover {
    text-decoration: underline;
}

.title-desc-home {
    color: #fff;
    font-size: 35px;
    font-style: bold;
    padding-bottom: 60px;
    font-family: cursive;
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

.admin-text {
    font-size: 35px;
    font-family: "Quicksand", sans-serif;
    color: #38414a;
}
</style>

<body class="authentication-bg">

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
                        <li><a href="../../index.php"><i class="fas fa-home"></i> Beranda</a></li>
                        <li class="menu-active"><a href="index.php"><i class="fas fa-user-shield"></i> Admin Panel</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <a href="index.php">
                                    <p class="admin-text">ADMIN PANEL ULASAN CANVA</p>
                                </a>
                                <p class="text-muted mb-4 mt-3">
                                    <i class="fas fa-shield-alt"></i> Masukkan kredensial Anda untuk mengakses 
                                    panel administrasi sistem ulasan Canva
                                </p>
                            </div>

                            <form method='post'>

                                <div class="form-group mb-3">
                                    <label for="emailaddress"><i class="fas fa-envelope"></i> Alamat Email</label>
                                    <input class="form-control" name="ad_email" type="email" id="emailaddress"
                                        required="" placeholder="Masukkan email admin Anda">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password"><i class="fas fa-lock"></i> Kata Sandi</label>
                                    <div class="input-group">
                                        <input class="form-control" name="ad_pwd" type="password" required=""
                                            id="password" placeholder="Masukkan kata sandi Anda">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" name="admin_login" type="submit"> 
                                        <i class="fas fa-sign-in-alt"></i> Masuk ke Panel Admin
                                    </button>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 text-center" style="margin-bottom:-20px;">
                                        <p><a href="#"
                                                class="text-primary ml-1 forgot-password-link">
                                                <i class="fas fa-question-circle"></i> Lupa kata sandi?</a>
                                        </p>
                                    </div> <!-- end col -->
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->




    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        var passwordInput = document.getElementById('password');
        var passStatus = document.getElementById('togglePassword').querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passStatus.classList.remove('fa-eye');
            passStatus.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            passStatus.classList.remove('fa-eye-slash');
            passStatus.classList.add('fa-eye');
        }
    });
    </script>

</body>

</html>