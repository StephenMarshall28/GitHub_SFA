<?php
// Database connection for both local XAMPP and Render deployment.
// On Render, set DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT in Environment Variables.
// Locally, it falls back to localhost/root/(empty password)/smartfarm.

function getDbConnection() {
    $host = getenv('DB_HOST') ?: 'localhost';
    $user = getenv('DB_USER') ?: 'root';
    $pass = getenv('DB_PASS') ?: '';
    $name = getenv('DB_NAME') ?: 'smartfarm';
    $port = getenv('DB_PORT') ?: 3306;

    $conn = mysqli_init();

    // Optional SSL support for hosted MySQL providers such as Aiven.
    // If your provider requires SSL, set DB_SSL=true and add DB_SSL_CA path if needed.
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
    return $conn;
}
?>
