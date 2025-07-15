<?php
// Script to generate password hash for admin login
// This uses the same double encryption method as the login system

function generatePasswordHash($password) {
    return sha1(md5($password));
}

echo "Password Hash Generator for Ulasan Canva Admin\n";
echo "==============================================\n\n";

$passwords = [
    'Password@123',
    'admin123'
];

foreach($passwords as $password) {
    $hash = generatePasswordHash($password);
    echo "Password: $password\n";
    echo "Hash: $hash\n\n";
}

// Test specific passwords
echo "Additional password hashes:\n";
echo "Password: admin\n";
echo "Hash: " . generatePasswordHash('admin') . "\n\n";

echo "Password: 123456\n";
echo "Hash: " . generatePasswordHash('123456') . "\n\n";
?>
