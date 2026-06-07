<?php
session_start();

require_once __DIR__ . '/db.php';
$conn = getDbConnection();

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
                        <a href="news.php">📰News</a>
                        <a href="indoorplants.html">🪴Indoor</a>
                        <a href="outdoorplants.html">🌿Outdoor</a>
                        <a href="flowers.html">🌻Flowers</a>
                        <a href="ourdatabase.php">🏢Suppliers</a>
                        <a href="checkyourplant.html">🔎Plant Analyzer</a>
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