<!-- Program ini adalah file konfigurasi untuk menghubungkan ke database. 
Dalam file ini, terdapat variabel yang berisi informasi tentang host database, nama database, username, dan password database. 
Dengan demikian, file ini bertanggung jawab untuk mengatur koneksi ke database sehingga aplikasi dapat berinteraksi 
dengan database untuk mengambil, menyimpan, atau mengelola data sesuai kebutuhan.-->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ulasan_canva";

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}