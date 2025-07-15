<!-- Secara keseluruhan, kode ini memastikan bahwa administrator benar-benar keluar dari sistem 
dengan menghapus data sesi yang relevan dan mengarahkan mereka ke halaman logout. -->
<?php
    session_start();
    unset($_SESSION['ad_id']);
    session_destroy();

    header("Location: admin_logout.php");
    exit;
?>