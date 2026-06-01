<?php

$conn = mysqli_connect("localhost","root","","smartfarm");

if(isset($_POST['submit']))
{
    $news_title = $_POST['news_title'];
    $news_summary = $_POST['news_summary'];
    $news_source = $_POST['news_source'];

    /* IMAGE UPLOAD */

    $image_name = $_FILES['news_image']['name'];
    $temp_name = $_FILES['news_image']['tmp_name'];

    $folder = "newsimg/" . $image_name;

    move_uploaded_file($temp_name, $folder);

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

