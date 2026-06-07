<?php
require_once __DIR__ . '/db.php';
$conn = getDbConnection();

if(isset($_POST['delete']))
{
    $id = $_POST['id'];

    if(empty($id))
    {
        echo "<script>alert('Please select a news article first!');</script>";
    }
    else
    {
        $check = mysqli_query($conn, "SELECT * FROM newsdatabase WHERE id='$id'");

        if(mysqli_num_rows($check) == 0)
        {
            echo "<script>alert('Invalid news ID selected!');</script>";
        }
        else
        {
            $row = mysqli_fetch_assoc($check);

          
            }

            $sql = "DELETE FROM newsdatabase WHERE id='$id'";

            if(mysqli_query($conn,$sql))
            {
                echo "<script>alert('News deleted successfully!');</script>";
            }
            else
            {
                echo "<script>alert('Delete failed!');</script>";
            }
        }
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
                        <a href="insertnews.php">➕Insert News</a>
                        <a href="insertdata.php">➕Insert Data</a>
                        <a href="updatedata.php">🔄Update Data</a>
                        <a href="deletedata.php">⛔Delete Data</a>
                        <a href="deletenews.php" class="active">⛔Delete News</a>
                        <a href="index.html">➜]Logout</a>
                    </nav>
            </div>

            <div class="submsg1">
                <h2>Delete News</h2>
            </div>

            <div class="form-container">

<h2>Select News to Delete</h2>

<form method="POST">

    <select name="id" required>
    <option value="">-- Please Select News --</option>

    <?php
    $result = mysqli_query($conn,"SELECT id, news_title FROM newsdatabase");

    while($row = mysqli_fetch_assoc($result))
    {
        echo "<option value='{$row['id']}'>
            {$row['id']} - {$row['news_title']}
        </option>";
    }
    ?>
</select>

    <button type="submit" name="delete" id="deleteBtn" disabled
onclick="return confirm('Are you sure you want to delete this record?')">
Delete Data
</button>

</form>

</div>

<script>
const select = document.querySelector("select[name='id']");
const button = document.getElementById("deleteBtn");

select.addEventListener("change", function(){
    button.disabled = (this.value === "");
});
</script>

            
           
            
</body>

<footer>
    <div class="copyrightinfo"><p>&copy; Copyright of Smart Farming Assistant 2026</p></div>
</footer>


</html>
