<?php
session_start();

require_once __DIR__ . '/db.php';
$conn = getDbConnection();

$createAdminTable = "CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    password VARCHAR(255)
)";
mysqli_query($conn, $createAdminTable);

$insertAdmin = "INSERT INTO admin (username, password)
SELECT * FROM (
    SELECT 'admin', '1234'
) AS tmp
WHERE NOT EXISTS (
    SELECT username FROM admin WHERE username='admin'
) LIMIT 1";
mysqli_query($conn, $insertAdmin);

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) == 1)
    {
        $_SESSION['admin'] = $username;
        header("Location: admindashboard.php"); // next page    
    }
    else
    {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="author" content="Stephen Marshall">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Smart Farming Assistant</title>
                <link rel="stylesheet" href="css/style.css">
                <link href="https://fonts.googleapis.com/css2?family=Geist&display=swap" rel="stylesheet">
            </head>

            <body>

            <div class="titlebanner">
                    <header>
                        <h1>🌱 Smart Farming Assistant</h1>
                    </header>
            </div>

            <div class="navigation">
                <nav>
                    <a href="index.html">🏡Home</a>
                    <a href="indoorplants.html">🪴Indoor Plants</a>
                    <a href="outdoorplants.html">🌿Outdoor Plants</a>
                    <a href="flowers.html">🌻Flowers</a>
                    <a href="ourdatabase.php">💾Our Database</a>
                    <a href="checkyourplant.html">🔎Check Your Plant</a>
                    <a href="admin.php" class="active">👨🏻‍💼Admin</a>
                </nav>
            </div>

<div class="login-box">
    <h2>Admin Login</h2>

    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>

</body>

<footer>
<div class="copyrightinfo"><p>&copy; Copyright of Smart Farming Assistant 2026</p></div>
</footer>

</html>
