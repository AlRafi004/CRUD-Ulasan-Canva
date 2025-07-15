<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // First check if the review exists
    $check_query = "SELECT user_name FROM komentar WHERE id=?";
    $check_stmt = $mysqli->prepare($check_query);
    $check_stmt->bind_param('i', $id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    
    if($check_result->num_rows > 0) {
        $review_data = $check_result->fetch_object();
        
        // Delete the review
        $delete_query = "DELETE FROM komentar WHERE id=?";
        $delete_stmt = $mysqli->prepare($delete_query);
        $delete_stmt->bind_param('i', $id);
        
        if($delete_stmt->execute()) {
            $_SESSION['success_message'] = "Ulasan dari pengguna '" . $review_data->user_name . "' berhasil dihapus!";
        } else {
            $_SESSION['error_message'] = "Gagal menghapus ulasan!";
        }
    } else {
        $_SESSION['error_message'] = "Ulasan tidak ditemukan!";
    }
    
    // Redirect back to reviews list
    header("Location: admin_view_reviews.php");
    exit();
} else {
    // No ID provided, redirect to reviews list
    header("Location: admin_view_reviews.php");
    exit();
}
?>
