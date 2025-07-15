<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];

// Get all reviews data
$ret = "SELECT * FROM komentar ORDER BY tgl DESC";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();

if($res->num_rows > 0) {
    // Set headers for download
    $filename = "semua_ulasan_canva_" . date('Y-m-d_H-i-s') . ".txt";
    
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    
    // Create export content
    $export_content = "=============================================\n";
    $export_content .= "       ULASAN CANVA - EXPORT SEMUA DATA\n";
    $export_content .= "=============================================\n\n";
    
    $export_content .= "Total Ulasan       : " . $res->num_rows . " ulasan\n";
    $export_content .= "Waktu Export       : " . date('d F Y H:i:s') . "\n";
    $export_content .= "Diekspor oleh      : Admin\n\n";
    
    // Calculate statistics
    $total_reviews = $res->num_rows;
    $positive_count = 0;
    $negative_count = 0;
    $neutral_count = 0;
    $total_rating = 0;
    $reviews_data = [];
    
    // Collect all data for processing
    while($row = $res->fetch_object()) {
        $reviews_data[] = $row;
        $total_rating += $row->score;
        
        if($row->label == 'Positif') {
            $positive_count++;
        } elseif($row->label == 'Negatif') {
            $negative_count++;
        } else {
            $neutral_count++;
        }
    }
    
    $average_rating = round($total_rating / $total_reviews, 2);
    
    $export_content .= "=============================================\n";
    $export_content .= "              STATISTIK ULASAN\n";
    $export_content .= "=============================================\n\n";
    
    $export_content .= "Rating Rata-rata   : " . $average_rating . "/5.0\n";
    $export_content .= "Ulasan Positif     : " . $positive_count . " (" . round(($positive_count/$total_reviews)*100, 1) . "%)\n";
    $export_content .= "Ulasan Negatif     : " . $negative_count . " (" . round(($negative_count/$total_reviews)*100, 1) . "%)\n";
    $export_content .= "Ulasan Netral      : " . $neutral_count . " (" . round(($neutral_count/$total_reviews)*100, 1) . "%)\n\n";
    
    $export_content .= "=============================================\n";
    $export_content .= "            DAFTAR SEMUA ULASAN\n";
    $export_content .= "=============================================\n\n";
    
    $counter = 1;
    foreach($reviews_data as $row) {
        $export_content .= "--- ULASAN #" . $counter . " ---\n";
        $export_content .= "ID               : " . $row->id . "\n";
        $export_content .= "Nama Pengguna    : " . $row->user_name . "\n";
        $export_content .= "Rating           : " . $row->score . "/5 bintang\n";
        $export_content .= "Tanggal          : " . date('d F Y', strtotime($row->tgl)) . "\n";
        $export_content .= "Kategori         : " . $row->label . "\n";
        $export_content .= "Isi Ulasan       :\n";
        $export_content .= wordwrap($row->content, 70) . "\n\n";
        
        if($row->label == 'Positif') {
            $export_content .= "✅ SENTIMEN POSITIF\n\n";
        } elseif($row->label == 'Negatif') {
            $export_content .= "❌ SENTIMEN NEGATIF\n\n";
        } else {
            $export_content .= "➖ SENTIMEN NETRAL\n\n";
        }
        
        $export_content .= "---------------------------------------------\n\n";
        $counter++;
    }
    
    $export_content .= "=============================================\n";
    $export_content .= "              KESIMPULAN ANALISIS\n";
    $export_content .= "=============================================\n\n";
    
    if($positive_count > $negative_count) {
        $export_content .= "🎉 OVERALL SENTIMENT: POSITIF\n";
        $export_content .= "Sebagian besar pengguna memberikan ulasan positif\n";
        $export_content .= "tentang platform Canva.\n\n";
    } elseif($negative_count > $positive_count) {
        $export_content .= "⚠️ OVERALL SENTIMENT: NEGATIF\n";
        $export_content .= "Sebagian besar pengguna memberikan ulasan negatif\n";
        $export_content .= "tentang platform Canva.\n\n";
    } else {
        $export_content .= "⚖️ OVERALL SENTIMENT: SEIMBANG\n";
        $export_content .= "Ulasan pengguna tentang platform Canva cukup\n";
        $export_content .= "berimbang antara positif dan negatif.\n\n";
    }
    
    $export_content .= "Rating rata-rata " . $average_rating . "/5.0 ";
    if($average_rating >= 4.0) {
        $export_content .= "menunjukkan kepuasan pengguna yang tinggi.\n\n";
    } elseif($average_rating >= 3.0) {
        $export_content .= "menunjukkan kepuasan pengguna yang cukup baik.\n\n";
    } else {
        $export_content .= "menunjukkan perlu adanya perbaikan layanan.\n\n";
    }
    
    $export_content .= "=============================================\n";
    $export_content .= "Diekspor dari Admin Panel Ulasan Canva\n";
    $export_content .= "© 2024 ULASAN CANVA. All rights reserved.\n";
    $export_content .= "=============================================\n";
    
    // Output the content
    echo $export_content;
    exit();
} else {
    $_SESSION['error_message'] = "Tidak ada data ulasan untuk diekspor!";
    header("Location: admin_view_reviews.php");
    exit();
}
?>
