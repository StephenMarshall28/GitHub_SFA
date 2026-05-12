<?php
$conn = mysqli_connect("localhost","root","","smartfarm");

$data = null;

if(isset($_POST['search']))
{
    $id = $_POST['id'];

    $sql = "SELECT * FROM smartfarmdatabase WHERE id='$id'";
    $result = mysqli_query($conn,$sql);

    $data = mysqli_fetch_assoc($result);
}

if(isset($_POST['update']))
{
    $id = $_POST['id'];

    if(empty($id))
    {
        echo "<script>alert('Please select data first!');</script>";
    }
    else
    {
        $business_name = $_POST['business_name'];
        $category = $_POST['category'];
        $produce = $_POST['produce'];
        $product = $_POST['product'];
        $business_type = $_POST['business_type'];
        $state_district = $_POST['state_district'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];

        $sql = "UPDATE smartfarmdatabase SET
            business_name='$business_name',
            category='$category',
            produce='$produce',
            product='$product',
            business_type='$business_type',
            state_district='$state_district',
            contact='$contact',
            email='$email'
            WHERE id='$id'";

        if(mysqli_query($conn,$sql))
        {
            echo "<script>alert('Data updated successfully!');</script>";
        }
        else
        {
            echo "<script>alert('Update failed!');</script>";
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
                        <a href="insertdata.php">➕Insert Data</a>
                        <a href="updatedata.php" class="active">🔄Update / Edit Data</a>
                        <a href="deletedata.php">⛔Delete data</a>
                        <a href="index.html">➜]Logout</a>
                    </nav>
            </div>

            <div class="submsg1">
                <h2>Update / Edit Data</h2>
            </div>

                    <div class="form-container">

                        <h2>Select Data to Update</h2>

                        <form method="POST">

                        <select name="id" onchange="this.form.submit()" required>
                        <option value="" disabled selected>-- Please Select ID --</option>

                        <?php
                        $result = mysqli_query($conn,"SELECT id, business_name FROM smartfarmdatabase");

                        while($row = mysqli_fetch_assoc($result))
                            {
                            $selected = ($data && $data['id'] == $row['id']) ? "selected" : "";

                            echo "<option value='{$row['id']}' $selected>
                                {$row['id']} - {$row['business_name']}
                                </option>";
                            }
                        ?>
                        </select>

                        <input type="hidden" name="search" value="1">

                        </form>

                    </div>

<div class="form-container">

<h2>Update Data</h2>

<form method="POST">

    <input type="hidden" name="id" value="<?php echo $data['id'] ?? ''; ?>">

    <input type="text" name="business_name" 
    value="<?php echo $data['business_name'] ?? ''; ?>" 
    placeholder="Business Name">

    <input type="text" name="category" 
    value="<?php echo $data['category'] ?? ''; ?>" 
    placeholder="Category">

    <input type="text" name="produce" 
    value="<?php echo $data['produce'] ?? ''; ?>" 
    placeholder="Produce">

    <input type="text" name="product" 
    value="<?php echo $data['product'] ?? ''; ?>" 
    placeholder="Product">

    <input type="text" name="business_type" 
    value="<?php echo $data['business_type'] ?? ''; ?>" 
    placeholder="Business Type">

    <input type="text" name="state_district" 
    value="<?php echo $data['state_district'] ?? ''; ?>" 
    placeholder="State & District">

    <input type="text" name="contact" 
    value="<?php echo $data['contact'] ?? ''; ?>" 
    placeholder="Contact">

    <input type="email" name="email" 
    value="<?php echo $data['email'] ?? ''; ?>" 
    placeholder="Email">

    <button type="submit" name="update"
        <?php echo $data ? '' : 'disabled'; ?>>
        Update Data
    </button>

</form>

</div>

           
            
</body>

<footer>
    <div class="copyrightinfo"><p>&copy; Copyright of Smart Farming Assistant 2026</p></div>
</footer>


</html>