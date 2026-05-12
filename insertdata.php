<?php
$conn = mysqli_connect("localhost","root","","smartfarm");

if(isset($_POST['submit']))
{
    $business_name = $_POST['business_name'];
    $category = $_POST['category'];
    $produce = $_POST['produce'];
    $product = $_POST['product'];
    $business_type = $_POST['business_type'];
    $state_district = $_POST['state_district'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    $sql = "INSERT INTO smartfarmdatabase 
    (business_name, category, produce, product, business_type, state_district, contact, email)
    VALUES 
    ('$business_name','$category','$produce','$product','$business_type','$state_district','$contact','$email')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Data inserted successfully!');</script>";
    }
    else
    {
        echo "<script>alert('Error inserting data');</script>";
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
                        <a href="insertdata.php" class="active">➕Insert Data</a>
                        <a href="updatedata.php">🔄Update / Edit Data</a>
                        <a href="deletedata.php">⛔Delete data</a>
                        <a href="index.html">➜]Logout</a>
                    </nav>
            </div>

            <div class="submsg1">
                <h2>Insert Data</h2>
            </div>

            <div class="form-container">

<form method="POST">

    <input type="text" name="business_name" placeholder="Business Name" required>

    <select name="category" required>
        <option value="">Select Category</option>
        <option value="LOCAL">Local Producer</option>
        <option value="FLORIST">Florist</option>
        <option value="FERTILIZER">Fertilizer</option>
        <option value="EQUIPMENT">Equipment</option>
        <option value="RETAILER">Retailer</option>
    </select>

    <input type="text" name="produce" placeholder="Produce (if applicable)">
    <input type="text" name="product" placeholder="Product (if applicable)">
    <input type="text" name="business_type" placeholder="Business Type (if applicable)">
    <input type="text" name="state_district" placeholder="State & District" required>
    <input type="text" name="contact" placeholder="Contact Number" required>
    <input type="email" name="email" placeholder="Email">

    <button type="submit" name="submit">Insert Data</button>

</form>

</div>

           
            
</body>

<footer>
    <div class="copyrightinfo"><p>&copy; Copyright of Smart Farming Assistant 2026</p></div>
</footer>


</html>