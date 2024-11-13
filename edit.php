<?php
include 'database.php';

$id = $_GET['id'];
$sql = "SELECT * FROM tabel_barang WHERE id_barang='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];

    $sql = "UPDATE tabel_barang SET nama_barang='$nama_barang', stok='$stok', harga_beli='$harga_beli', harga_jual='$harga_jual' WHERE id_barang='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");  // Redirect to index.php after editing data
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit Data Barang</h2>
    <form method="post">
        Nama Barang: <input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required><br>
        Stok: <input type="number" name="stok" value="<?php echo $row['stok']; ?>" required><br>
        Harga Beli: <input type="number" name="harga_beli" value="<?php echo $row['harga_beli']; ?>" required><br>
        Harga Jual: <input type="number" name="harga_jual" value="<?php echo $row['harga_jual']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>