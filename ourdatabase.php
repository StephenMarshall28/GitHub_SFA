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
                        <a href="ourdatabase.php" class="active">💾Our Database</a>
                        <a href="checkyourplant.html">🔎Check Your Plant</a>
                        <a href="admin.php">👨🏻‍💼Admin</a>
                    </nav>
            </div>

            <div class="submsg1">
                <h2>Our Database</h2>
            </div>

            <div class="para1">
    
                <p>This database platform is designed to make it easier for users to access important contacts and resources within the farming and agriculture community. We provides information that helps people connect with other food growers, plant growers, retailers, fertilizer suppliers, and farming equipment sellers in one convenient place. By bringing these resources together, this database supports better communication, easier business opportunities, and faster access to the products or services needed for successful farming. Furthermore, it helps people to build useful connections, expand their farming network, and grow their agricultural activities more efficiently.</p>
            </div>

             <div class="submsg2">
                <h2>Local Food Producers Database</h2>
            </div>

            <div class="public-table-container">
                    <table class="public-table">
                        <tr>
                            
                            <th>Business Name</th>
                            <th>Produce</th>
                            <th>State & District</th>
                            <th>Contact</th>
                            <th>Email</th>
                        </tr>

                        <?php
                            require_once __DIR__ . '/db.php';
                            $conn = getDbConnection();

                            $sql = "SELECT * FROM smartfarmdatabase WHERE category='LOCAL'";
                            $result = mysqli_query($conn,$sql);

                                while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>
                                            
                                            <td>{$row['business_name']}</td>
                                            <td>{$row['produce']}</td>
                                            <td>{$row['state_district']}</td>
                                            <td>{$row['contact']}</td>
                                            <td>{$row['email']}</td>
                                        </tr>";
                                    }
                        ?>
                    </table>
            </div>

                    <div class="submsg2">
                        <h2>Local Plantgrowers & Florist Database</h2>
                    </div>

            <div class="public-table-container">
                    <table class="public-table">
                        <tr>
                            
                            <th>Business Name</th>
                            <th>Product</th>
                            <th>Business Type</th>
                            <th>State & District</th>
                            <th>Contact</th>
                            <th>Email</th>
                        </tr>

                        <?php
                            require_once __DIR__ . '/db.php';
                            $conn = getDbConnection();

                            $sql = "SELECT * FROM smartfarmdatabase WHERE category='FLORIST'";
                            $result = mysqli_query($conn,$sql);

                                while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>
                                            
                                            <td>{$row['business_name']}</td>
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


                    <div class="submsg2">
                        <h2>Fertilizer Database</h2>
                    </div>

            <div class="public-table-container">
                     <table class="public-table">
                        <tr>
                            <th>Business Name</th>
                            <th>Product</th>
                            <th>Business Type</th>
                            <th>State & District</th>
                            <th>Contact</th>
                            <th>Email</th>
                        </tr>

                        <?php
                            $conn = mysqli_connect("localhost","root","","smartfarm");

                            $sql = "SELECT * FROM smartfarmdatabase WHERE category='FERTILIZER'";
                            $result = mysqli_query($conn,$sql);

                                while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>
                                            <td>{$row['business_name']}</td>
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


                    <div class="submsg2">
                        <h2>Equipment Database</h2>
                    </div>


            <div class="public-table-container">
                    <table class="public-table">
                        <tr>
                            <th>Business Name</th>
                            <th>Product</th>
                            <th>Business Type</th>
                            <th>State & District</th>
                            <th>Contact</th>
                            <th>Email</th>
                        </tr>

                        <?php
                            $conn = mysqli_connect("localhost","root","","smartfarm");

                            $sql = "SELECT * FROM smartfarmdatabase WHERE category='EQUIPMENT'";
                            $result = mysqli_query($conn,$sql);

                                while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>
                                            <td>{$row['business_name']}</td>
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

                    <div class="submsg2">
                        <h2>Retailers Database</h2>
                    </div>


            <div class="public-table-container">
                    <table class="public-table">
                        <tr>
                            <th>Business Name</th>
                            <th>Product</th>
                            <th>Business Type</th>
                            <th>State & District</th>
                            <th>Contact</th>
                            <th>Email</th>
                        </tr>

                        <?php
                            $conn = mysqli_connect("localhost","root","","smartfarm");

                            $sql = "SELECT * FROM smartfarmdatabase WHERE category='RETAILERS'";
                            $result = mysqli_query($conn,$sql);

                                while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>
                                            <td>{$row['business_name']}</td>
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

        
           
</body>

<footer>
<div class="copyrightinfo"><p>&copy; Copyright of Smart Farming Assistant 2026</p></div>
</footer>


</html>
