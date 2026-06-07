<?php
// Database connection for local XAMPP and Render/Aiven deployment.
// Render environment variables required:
// DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT, DB_SSL=true

function getDbConnection() {
    $host = getenv('DB_HOST') ?: 'localhost';
    $user = getenv('DB_USER') ?: 'root';
    $pass = getenv('DB_PASS') ?: '';
    $name = getenv('DB_NAME') ?: 'smartfarm';
    $port = getenv('DB_PORT') ?: 3306;

    $conn = mysqli_init();

    $ssl = strtolower((string)(getenv('DB_SSL') ?: 'false'));
    if ($ssl === 'true' || $ssl === '1' || $ssl === 'yes') {
        $ca = getenv('DB_SSL_CA') ?: null;
        mysqli_ssl_set($conn, null, null, $ca, null, null);
        $connected = mysqli_real_connect($conn, $host, $user, $pass, $name, (int)$port, null, MYSQLI_CLIENT_SSL);
    } else {
        $connected = mysqli_real_connect($conn, $host, $user, $pass, $name, (int)$port);
    }

    if (!$connected) {
        die('Database connection failed: ' . mysqli_connect_error());
    }

    mysqli_set_charset($conn, 'utf8mb4');
    ensureDatabaseTables($conn);
    return $conn;
}

function ensureDatabaseTables($conn) {
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS admin (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50),
        password VARCHAR(50)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    mysqli_query($conn, "INSERT INTO admin (username, password)
        SELECT 'admin', '1234'
        WHERE NOT EXISTS (SELECT 1 FROM admin WHERE username='admin' LIMIT 1)");

    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS smartfarmdatabase (
        id INT AUTO_INCREMENT PRIMARY KEY,
        business_name VARCHAR(100) NOT NULL,
        category VARCHAR(50) NOT NULL,
        produce VARCHAR(100) NOT NULL,
        product VARCHAR(100) NOT NULL,
        business_type VARCHAR(100) NOT NULL,
        state_district VARCHAR(100) NOT NULL,
        contact VARCHAR(30) NOT NULL,
        email VARCHAR(100) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS newsdatabase (
        id INT AUTO_INCREMENT PRIMARY KEY,
        news_image VARCHAR(255) NOT NULL,
        news_title VARCHAR(255) NOT NULL,
        news_summary TEXT NOT NULL,
        news_source VARCHAR(500) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
}
?>
