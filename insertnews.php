<?php

require_once __DIR__ . '/db.php';
$conn = getDbConnection();

if(isset($_POST['submit']))
{
    $news_title = $_POST['news_title'];
    $news_summary = $_POST['news_summary'];
    $news_source = $_POST['news_source'];

    /* IMAGE UPLOAD */

    $tmpPath = $_FILES['news_image']['tmp_name'];
    $mimeType = mime_content_type($tmpPath);

    $allowed = ['image/jpeg', 'image/png', 'image/webp'];

    if (!in_array($mimeType, $allowed)) {
    echo "<script>alert('Please upload JPG, PNG, or WEBP only');</script>";
    exit;
}

$imageData = base64_encode(file_get_contents($tmpPath));
$folder = "data:$mimeType;base64,$imageData";
    }

    $image_name = basename($_FILES['news_image']['name']);
    $safe_name = time() . "_" . preg_replace('/[^A-Za-z0-9._-]/', '_', $image_name);
    $temp_name = $_FILES['news_image']['tmp_name'];

    $folder = "newsimg/" . $safe_name;
    $targetPath = $uploadDir . $safe_name;

    if (!move_uploaded_file($temp_name, $targetPath)) {
        echo "<script>alert('Error uploading image file');</script>";
        exit;
    }

    /* INSERT DATABASE */

    $sql = "INSERT INTO newsdatabase
    (news_image, news_title, news_summary, news_source)

    VALUES

    ('$folder','$news_title','$news_summary','$news_source')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('News uploaded successfully!');</script>";
    }
    else
    {
        echo "<script>alert('Error uploading news');</script>";
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
                        <a href="admindashboard.php">📊Dashboard</a>
                        <a href="insertnews.php" class="active">➕Insert News</a>
                        <a href="insertdata.php">➕Insert Data</a>
                        <a href="updatedata.php">🔄Update Data</a>
                        <a href="deletedata.php">⛔Delete Data</a>
                        <a href="deletenews.php">⛔Delete News</a>
                        <a href="index.html">➜]Logout</a>
                    </nav>
            </div>


<div class="submsg1">
    <h2>Upload News Article</h2>
</div>


<div class="form-container">

<form method="POST" enctype="multipart/form-data">

    <input type="text"
           name="news_title"
           placeholder="News Title"
           required>

    <textarea name="news_summary"
              placeholder="Short Summary"
              rows="6"
              required></textarea>

    <input type="text"
           name="news_source"
           placeholder="News Source Link"
           required>

    <input type="file"
           name="news_image"
           accept="image/*"
           required>

    <button type="submit" name="submit">
        Upload News
    </button>

</form>

</div>

</body>

<footer>
    <div class="copyrightinfo">
        <p>&copy; Copyright of Smart Farming Assistant 2026</p>
    </div>
</footer>

</html>

