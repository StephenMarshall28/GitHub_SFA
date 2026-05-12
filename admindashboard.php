<?php
$conn = mysqli_connect("localhost","root","","smartfarm");

if(isset($_POST['reset']))
{
    mysqli_query($conn, "SET @num := 0");

    mysqli_query($conn, "
        UPDATE smartfarmdatabase 
        SET id = (@num := @num + 1)
        ORDER BY id
    ");

    mysqli_query($conn, "ALTER TABLE smartfarmdatabase AUTO_INCREMENT = 1");

    echo "<script>alert('IDs reset successfully!'); window.location='admindashboard.php';</script>";
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
                        <a href="admindashboard.php" class="active">📊Dashboard</a>
                        <a href="insertdata.php">➕Insert Data</a>
                        <a href="updatedata.php">🔄Update / Edit Data</a>
                        <a href="deletedata.php">⛔Delete data</a>
                        <a href="index.html">➜]Logout</a>
                    </nav>
            </div>

            <div class="submsg1">
                <h2>Smart Farming Assistant Database Dashboard</h2>
            </div>

            <div class="para1">
    
                <p>Welcome admin. This is the Smart Farming Assiatant Dashboard where we display all the database in our system.</p>
            </div>

            <div class="admin-table-container">
                        <table class="admin-table">
                                <tr>
                                    <th>ID</th>
                                    <th>Business Name</th>
                                    <th>Category</th>
                                    <th>Produce</th>
                                    <th>Product</th>
                                    <th>Business Type</th>
                                    <th>State & District</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                </tr>

                        <?php
                        $conn = mysqli_connect("localhost","root","","smartfarm");

                        $sql = "SELECT * FROM smartfarmdatabase";
                        $result = mysqli_query($conn,$sql);

                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['business_name']}</td>
                                        <td>{$row['category']}</td>
                                        <td>{$row['produce']}</td>
                                        <td>{$row['product']}</td>
                                        <td>{$row['business_type']}</td>
                                        <td>{$row['state_district']}</td>
                                        <td>{$row['contact']}</td>
                                        <td>{$row['email']}</td>
                                        </tr>";
                            }
                        ?>
                        </table>
                </div>


                <div class="resetid-form-container">
                    <form method="POST">
                        <button type="submit" name="reset" 
                        onclick="return confirm('Reset all IDs? This cannot be undone!')">
                        ↻ Reset ID
                        </button>
                    </form>
                </div>
               

            
</body>

<footer>
    <div class="copyrightinfo"><p>&copy; Copyright of Smart Farming Assistant 2026</p></div>
</footer>


</html>