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
                        <a href="ourdatabase.php" class="active">🏢Suppliers</a>
                        <a href="checkyourplant.html">🔎Plant Analyzer</a>
                        <a href="admin.php">👨🏻‍💼Admin</a>
                 </nav>
            </div>

            <div class="submsg1">
                <h2>Suppliers</h2>
            </div>

            <div class="para1">
    
                <p>This section of website is designed to help users easily find important contacts and resources within the farming and agriculture community. It provides useful information that allows visitors to connect with food growers, plant growers, retailers, fertilizer suppliers, and farming equipment sellers all in one convenient place. By bringing these suppliers and resources together, this platform supports better communication, creates more business opportunities, and provides faster access to products and services needed for successful farming. In addition, it helps users build valuable connections, expand their farming network, and grow their agricultural activities more efficiently.</p>
            </div>

                <div class="supplier-search-container">
                    <input 
                    type="text" 
                    id="supplierSearch" 
                    placeholder="🔎 Search business, product, location, contact or email..."
                    onkeyup="searchSuppliers()"
                >

                <p id="noResults" class="supplier-no-results" style="display:none;">
                    ❌ No matching suppliers found
                </p>
            </div>

            <div class="supplier-section">

             <div class="submsg2">
                <h2>Local Food Producers</h2>
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
                            $conn = mysqli_connect("localhost","root","","smartfarm");

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
            </div>

                    <div class="supplier-section">

                    <div class="submsg2">
                        <h2>Local Plantgrowers and Florist</h2>
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
            </div>


            <div class="supplier-section">
                    <div class="submsg2">
                        <h2>Fertilizer</h2>
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
            </div>

            <div class="supplier-section">
                    <div class="submsg2">
                        <h2>Hardware and Equipment</h2>
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
            </div>

            <div class="supplier-section">
                    <div class="submsg2">
                        <h2>Retailers</h2>
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
            </div>

            <script>
function searchSuppliers() {
    let input = document.getElementById("supplierSearch").value.toLowerCase();
    let sections = document.getElementsByClassName("supplier-section");
    let noResults = document.getElementById("noResults");

    let totalVisible = 0;

    for (let i = 0; i < sections.length; i++) {
        let section = sections[i];
        let rows = section.getElementsByTagName("tr");

        let sectionMatch = false;

        // check all rows inside this section
        for (let j = 1; j < rows.length; j++) {
            let row = rows[j];
            let text = row.innerText.toLowerCase();

            if (text.includes(input)) {
                row.style.display = "";
                sectionMatch = true;
                totalVisible++;
            } else {
                row.style.display = "none";
            }
        }

        // 🔥 show/hide entire section
        if (sectionMatch || input === "") {
            section.style.display = "";
        } else {
            section.style.display = "none";
        }
    }

    // show "no results"
    if (totalVisible === 0) {
        noResults.style.display = "block";
    } else {
        noResults.style.display = "none";
    }
}
</script>
        
           
</body>

<footer>
<div class="copyrightinfo"><p>&copy; Copyright of Smart Farming Assistant 2026</p></div>
</footer>


</html>