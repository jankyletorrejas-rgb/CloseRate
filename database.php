<?php
// seed.php — run this once in the browser to create demo accounts, then delete it
require 'config.php';

$demoUsers = [
    ['Maren Ostrow', 'seller@closerate.test', 'seller123', 'user'],
    ['Theo Calder',  'buyer@closerate.test',  'buyer123',  'user'],
    ['Admin Account','admin@closerate.test',  'admin123',  'admin'],
];

$stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");

foreach ($demoUsers as $u) {
    $hashed = password_hash($u[2], PASSWORD_DEFAULT);
    try {
        $stmt->execute([$u[0], $u[1], $hashed, $u[3]]);
        echo "Created: {$u[1]}<br>";
    } catch (PDOException $e) {
        echo "Skipped {$u[1]} (already exists)<br>";
    }
}