<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Logout - Ulasan Canva Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Ulasan Canva Admin Logout Page" name="description" />
        <meta content="CRUD Ulasan Canva" name="author" />
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
        body {
            font-family: "Rubik", sans-serif;
            background: linear-gradient(135deg, #7d2ae8 0%, #5a1fb3 50%, #00c4cc 100%);
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        
        .logout-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .logout-card {
            background: white;
            border-radius: 20px;
            padding: 50px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .logout-icon {
            font-size: 80px;
            color: #28a745;
            margin-bottom: 30px;
            animation: fadeInScale 1s ease-out;
            text-align: center;
            display: block;
            width: 100%;
        }
        
        .logout-title {
            color: #7d2ae8;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 15px;
            font-family: "Rubik", sans-serif;
            text-align: center;
            width: 100%;
        }
        
        .logout-message {
            color: #6c757d;
            font-size: 18px;
            margin-bottom: 40px;
            line-height: 1.6;
            text-align: center;
            width: 100%;
        }
        
        .logout-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn-logout {
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            min-width: 180px;
            justify-content: center;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #7d2ae8 0%, #5a1fb3 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(125, 42, 232, 0.3);
        }
        
        .btn-login:hover {
            background: linear-gradient(135deg, #00c4cc 0%, #008a94 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 196, 204, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .btn-home {
            background: linear-gradient(135deg, #00c4cc 0%, #008a94 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(0, 196, 204, 0.3);
        }
        
        .btn-home:hover {
            background: linear-gradient(135deg, #7d2ae8 0%, #5a1fb3 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(125, 42, 232, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .logo-container {
            margin-bottom: 30px;
            text-align: center;
            width: 100%;
        }
        
        .logo-text {
            color: #7d2ae8;
            font-size: 28px;
            font-weight: bold;
            margin: 0;
            font-family: "Rubik", sans-serif;
            text-align: center;
        }
        
        @keyframes fadeInScale {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        @media (max-width: 768px) {
            .logout-card {
                padding: 30px 20px;
                margin: 0 10px;
            }
            
            .logout-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-logout {
                width: 100%;
                max-width: 250px;
            }
            
            .logout-title {
                font-size: 24px;
            }
            
            .logout-icon {
                font-size: 60px;
                text-align: center;
                display: block;
                width: 100%;
            }
        }
    </style>

    <body>
        <div class="logout-container">
            <div class="logout-card">
                <div class="logo-container">
                    <h3 class="logo-text">🎨 ULASAN CANVA</h3>
                </div>
                
                <div class="logout-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                
                <h2 class="logout-title">Logout Berhasil!</h2>
                <p class="logout-message">
                    Anda telah berhasil keluar dari sistem admin Ulasan Canva. 
                    Terima kasih telah menggunakan platform kami.
                </p>
                
                <div class="logout-buttons">
                    <a href="index.php" class="btn-logout btn-login">
                        <i class="fas fa-sign-in-alt"></i>
                        Login Kembali
                    </a>
                    
                    <a href="../../index.php" class="btn-logout btn-home">
                        <i class="fas fa-home"></i>
                        Ke Beranda
                    </a>
                </div>
            </div>
        </div>

        <!-- App js -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        
        <script>
        // Auto redirect after 10 seconds
        let countdown = 10;
        const countdownText = document.createElement('p');
        countdownText.style.color = '#6c757d';
        countdownText.style.fontSize = '14px';
        countdownText.style.marginTop = '20px';
        
        function updateCountdown() {
            countdownText.innerHTML = `Akan diarahkan ke halaman login dalam ${countdown} detik...`;
            countdown--;
            
            if (countdown < 0) {
                window.location.href = 'index.php';
            }
        }
        
        document.querySelector('.logout-card').appendChild(countdownText);
        updateCountdown();
        setInterval(updateCountdown, 1000);
        </script>
    </body>

</html>