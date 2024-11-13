<?php
include 'database.php';

$id = $_GET['id'];
$sql = "DELETE FROM tabel_barang WHERE id_barang='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");  // Redirect to index.php after deleting data
} else {
    echo "Error deleting record: " . $conn->error;
}
?>