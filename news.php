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
                        <a href="news.php" class="active">📰News</a>
                        <a href="indoorplants.html">🪴Indoor</a>
                        <a href="outdoorplants.html">🌿Outdoor</a>
                        <a href="flowers.html">🌻Flowers</a>
                        <a href="ourdatabase.php">🏢Suppliers</a>
                        <a href="checkyourplant.html">🔎Plant Analyzer</a>
                        <a href="admin.php">👨🏻‍💼Admin</a>
                    </nav>
            </div>

            <div class="news-section">

<?php

$conn = mysqli_connect("localhost","root","","smartfarm");

$result = mysqli_query($conn,
"SELECT * FROM newsdatabase ORDER BY id DESC");

while($row = mysqli_fetch_assoc($result))
{
?>

    <div class="news-card">

        <div class="news-image">
            <img src="<?php echo $row['news_image']; ?>" alt="News Image">
        </div>

        <div class="news-content">

            <h3>
                <?php echo $row['news_title']; ?>
            </h3>

            <p>
                <?php echo $row['news_summary']; ?>
            </p>

            <a href="<?php echo $row['news_source']; ?>"
               target="_blank"
               rel="noopener noreferrer">

                Read Full Article →
            </a>

        </div>

    </div>

<?php
}
?>

</div>


            </body>

<footer>
    <div class="copyrightinfo"><p>&copy; Copyright of Smart Farming Assistant 2026</p></div>
</footer>


</html>