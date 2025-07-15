<?php
include('backend/admin/assets/inc/config.php');

echo "Creating his_admin table for CRUD Ulasan Canva...\n";

// Create his_admin table
$sql_create = "CREATE TABLE IF NOT EXISTS `his_admin` (
  `ad_id` int(20) NOT NULL AUTO_INCREMENT,
  `ad_fname` varchar(200) DEFAULT NULL,
  `ad_lname` varchar(200) DEFAULT NULL,
  `ad_email` varchar(200) DEFAULT NULL,
  `ad_pwd` varchar(200) DEFAULT NULL,
  `ad_dpic` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

if ($mysqli->query($sql_create) === TRUE) {
    echo "✅ Table his_admin created successfully\n";
} else {
    echo "❌ Error creating table: " . $mysqli->error . "\n";
}

// Insert admin users
$sql_insert1 = "INSERT INTO `his_admin` (`ad_id`, `ad_fname`, `ad_lname`, `ad_email`, `ad_pwd`, `ad_dpic`) VALUES
(1, 'Admin', 'Canva', 'admin@mail.com', '4c7f5919e957f354d57243d37f223cf31e9e7181', 'doc-icon.png')
ON DUPLICATE KEY UPDATE ad_email=VALUES(ad_email)";

$sql_insert2 = "INSERT INTO `his_admin` (`ad_id`, `ad_fname`, `ad_lname`, `ad_email`, `ad_pwd`, `ad_dpic`) VALUES
(2, 'Super', 'Admin', 'admin', '036d0ef7567a20b5a4ad24a354ea4a945ddab676', 'doc-icon.png')
ON DUPLICATE KEY UPDATE ad_email=VALUES(ad_email)";

if ($mysqli->query($sql_insert1) === TRUE) {
    echo "✅ Admin user 1 inserted successfully\n";
} else {
    echo "❌ Error inserting admin 1: " . $mysqli->error . "\n";
}

if ($mysqli->query($sql_insert2) === TRUE) {
    echo "✅ Admin user 2 inserted successfully\n";
} else {
    echo "❌ Error inserting admin 2: " . $mysqli->error . "\n";
}

// Verify data
$result = $mysqli->query("SELECT * FROM his_admin");
echo "\n📋 Current admin users:\n";
echo "ID | Name | Email | Password Hash\n";
echo "---|------|-------|---------------\n";

while($row = $result->fetch_assoc()) {
    echo $row['ad_id'] . " | " . $row['ad_fname'] . " " . $row['ad_lname'] . " | " . $row['ad_email'] . " | " . substr($row['ad_pwd'], 0, 20) . "...\n";
}

echo "\n🔑 Login Credentials:\n";
echo "Email: admin@mail.com | Password: Password@123\n";
echo "Email: admin | Password: admin123\n";

$mysqli->close();
?>
