<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup Admin - CRUD Ulasan Canva</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .success { color: #28a745; }
        .error { color: #dc3545; }
        .info { color: #007bff; }
        pre { background: #f8f9fa; padding: 15px; border-radius: 5px; overflow-x: auto; }
        h1 { color: #7d2ae8; }
        .credential { background: #e9ecef; padding: 10px; border-radius: 5px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎨 Setup Admin - CRUD Ulasan Canva</h1>
        
        <?php
        include('backend/admin/assets/inc/config.php');

        echo "<h3>📋 Database Setup Status</h3>";

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
            echo "<p class='success'>✅ Table his_admin created successfully</p>";
        } else {
            echo "<p class='error'>❌ Error creating table: " . $mysqli->error . "</p>";
        }

        // Check if admin exists
        $check_admin = $mysqli->query("SELECT COUNT(*) as count FROM his_admin");
        $admin_count = $check_admin->fetch_assoc()['count'];

        if ($admin_count == 0) {
            // Insert admin users
            $sql_insert1 = "INSERT INTO `his_admin` (`ad_fname`, `ad_lname`, `ad_email`, `ad_pwd`, `ad_dpic`) VALUES
            ('Admin', 'Canva', 'admin@mail.com', '4c7f5919e957f354d57243d37f223cf31e9e7181', 'doc-icon.png')";

            $sql_insert2 = "INSERT INTO `his_admin` (`ad_fname`, `ad_lname`, `ad_email`, `ad_pwd`, `ad_dpic`) VALUES
            ('Super', 'Admin', 'admin', '036d0ef7567a20b5a4ad24a354ea4a945ddab676', 'doc-icon.png')";

            if ($mysqli->query($sql_insert1) === TRUE) {
                echo "<p class='success'>✅ Admin user 1 inserted successfully</p>";
            } else {
                echo "<p class='error'>❌ Error inserting admin 1: " . $mysqli->error . "</p>";
            }

            if ($mysqli->query($sql_insert2) === TRUE) {
                echo "<p class='success'>✅ Admin user 2 inserted successfully</p>";
            } else {
                echo "<p class='error'>❌ Error inserting admin 2: " . $mysqli->error . "</p>";
            }
        } else {
            echo "<p class='info'>ℹ️ Admin users already exist ($admin_count users found)</p>";
        }

        // Verify data
        $result = $mysqli->query("SELECT * FROM his_admin");
        echo "<h3>👥 Current Admin Users:</h3>";
        echo "<table border='1' cellpadding='10' style='border-collapse: collapse; width: 100%;'>";
        echo "<tr style='background: #7d2ae8; color: white;'><th>ID</th><th>Name</th><th>Email</th><th>Password Hash</th></tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['ad_id'] . "</td>";
            echo "<td>" . $row['ad_fname'] . " " . $row['ad_lname'] . "</td>";
            echo "<td>" . $row['ad_email'] . "</td>";
            echo "<td>" . substr($row['ad_pwd'], 0, 20) . "...</td>";
            echo "</tr>";
        }
        echo "</table>";

        $mysqli->close();
        ?>

        <h3>🔑 Login Credentials</h3>
        <div class="credential">
            <strong>Option 1:</strong><br>
            Email: <code>admin@mail.com</code><br>
            Password: <code>Password@123</code>
        </div>
        
        <div class="credential">
            <strong>Option 2:</strong><br>
            Email: <code>admin</code><br>
            Password: <code>admin123</code>
        </div>

        <h3>🚀 Next Steps</h3>
        <ol>
            <li>Go to <a href="backend/admin/" target="_blank">Admin Login Page</a></li>
            <li>Use one of the credentials above to login</li>
            <li>Test the logout functionality</li>
            <li>If login works, logout should work too!</li>
        </ol>

        <h3>🔧 Troubleshooting</h3>
        <p><strong>If login fails:</strong></p>
        <ul>
            <li>Make sure XAMPP Apache and MySQL are running</li>
            <li>Check if database 'ulasan_canva' exists</li>
            <li>Verify table 'his_admin' was created above</li>
            <li>Use exact credentials (case sensitive)</li>
        </ul>

        <p><strong>If logout fails:</strong></p>
        <ul>
            <li>Check if file 'his_admin_logout.php' exists</li>
            <li>Verify session handling is working</li>
            <li>Clear browser cookies if needed</li>
        </ul>

        <div style="margin-top: 30px; padding: 20px; background: #e7f3ff; border-radius: 5px;">
            <strong>✨ Setup Complete!</strong><br>
            Your CRUD Ulasan Canva admin system is now ready to use. 
            The logout functionality should work properly now.
        </div>
    </div>
</body>
</html>
