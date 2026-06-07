<?php
require_once __DIR__ . '/db.php';
$conn = getDbConnection();

$sql = "ALTER TABLE newsdatabase MODIFY news_image LONGTEXT NOT NULL";

if (mysqli_query($conn, $sql)) {
    echo "news_image column updated to LONGTEXT successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
