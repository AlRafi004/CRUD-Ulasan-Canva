<!-- Program ini adalah sebuah fungsi untuk memeriksa apakah pengguna sudah login atau belum ke dalam sesi. 
Jika pengguna belum login atau sesinya belum ada, maka fungsi ini akan mengarahkan pengguna kembali ke halaman login. 
Ini membantu mengamankan area yang hanya dapat diakses oleh pengguna yang sudah login.-->

<?php
function check_login()
{
if(strlen($_SESSION['ad_id'])==0)
	{
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="index.php";
		$_SESSION["ad_id"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>
