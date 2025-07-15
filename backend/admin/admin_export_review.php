<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Get review data
    $ret = "SELECT * FROM komentar WHERE id=?";
    $stmt = $mysqli->prepare($ret);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $res = $stmt->get_result();
    
    if($res->num_rows > 0) {
        $row = $res->fetch_object();
        
        // Set headers for download
        $filename = "ulasan_canva_" . $row->user_name . "_" . date('Y-m-d', strtotime($row->tgl)) . ".txt";
        $filename = preg_replace('/[^a-zA-Z0-9_.-]/', '_', $filename); // Clean filename
        
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        
        // Create export content
        $export_content = "=============================================\n";
        $export_content .= "      ULASAN CANVA - EXPORT DATA\n";
        $export_content .= "=============================================\n\n";
        
        $export_content .= "ID Ulasan       : " . $row->id . "\n";
        $export_content .= "Nama Pengguna   : " . $row->user_name . "\n";
        $export_content .= "Rating          : " . $row->score . "/5 bintang\n";
        $export_content .= "Tanggal Ulasan  : " . date('d F Y', strtotime($row->tgl)) . "\n";
        $export_content .= "Kategori        : " . $row->label . "\n";
        $export_content .= "Waktu Export    : " . date('d F Y H:i:s') . "\n\n";
        
        $export_content .= "=============================================\n";
        $export_content .= "              ISI ULASAN\n";
        $export_content .= "=============================================\n\n";
        
        $export_content .= wordwrap($row->content, 70) . "\n\n";
        
        $export_content .= "=============================================\n";
        $export_content .= "            ANALISIS SENTIMEN\n";
        $export_content .= "=============================================\n\n";
        
        if($row->label == 'Positif') {
            $export_content .= "✅ SENTIMEN POSITIF\n";
            $export_content .= "Ulasan ini menunjukkan pengalaman yang baik\n";
            $export_content .= "dengan platform Canva.\n\n";
        } elseif($row->label == 'Negatif') {
            $export_content .= "❌ SENTIMEN NEGATIF\n";
            $export_content .= "Ulasan ini menunjukkan pengalaman yang kurang\n";
            $export_content .= "memuaskan dengan platform Canva.\n\n";
        } else {
            $export_content .= "➖ SENTIMEN NETRAL\n";
            $export_content .= "Ulasan ini menunjukkan pengalaman yang biasa\n";
            $export_content .= "dengan platform Canva.\n\n";
        }
        
        $export_content .= "=============================================\n";
        $export_content .= "Diekspor dari Admin Panel Ulasan Canva\n";
        $export_content .= "© 2024 ULASAN CANVA. All rights reserved.\n";
        $export_content .= "=============================================\n";
        
        // Output the content
        echo $export_content;
        exit();
    } else {
        $_SESSION['error_message'] = "Ulasan tidak ditemukan!";
        header("Location: admin_view_reviews.php");
        exit();
    }
} else {
    $_SESSION['error_message'] = "ID ulasan tidak valid!";
    header("Location: admin_view_reviews.php");
    exit();
}
?>
