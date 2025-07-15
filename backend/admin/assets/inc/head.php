<!-- Program ini adalah bagian dari halaman HTML yang mengatur aspek-aspek penting dari tampilan dan fungsi situs web "System Ulasan Canva". 
Secara keseluruhan, bagian ini mengelola pengaturan dasar tampilan, menghubungkan dengan berbagai file CSS dan JavaScript, 
dan memberikan fungsionalitas notifikasi Sweet Alert untuk interaksi pengguna yang lebih baik.-->

<head>
        <meta charset="utf-8" />
        <title>Admin Panel - Ulasan Canva</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Panel administrasi untuk mengelola ulasan dan review aplikasi Canva" name="description" />
        <meta content="Ulasan Canva Team" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Plugins css -->
        <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
         <!-- Loading button css -->
         <link href="assets/libs/ladda/ladda-themeless.min.css" rel="stylesheet" type="text/css" />

        <!-- Footable css -->
        <link href="assets/libs/footable/footable.core.min.css" rel="stylesheet" type="text/css" />

        <!-- CUSTOM THEME - LOAD LAST FOR PRIORITY -->
        <link href="assets/css/canva-theme.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

       <!--Load Sweet Alert Javascript-->
       <script src="assets/js/swal.js"></script>
       
        <!--Inject SWAL-->
        <?php if(isset($success)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success","<?php echo $success;?>","success");
                            },
                                100);
                </script>

        <?php } ?>

        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Failed","<?php echo $err;?>","error");
                            },
                                100);
                </script>

        <?php } ?>

</head>