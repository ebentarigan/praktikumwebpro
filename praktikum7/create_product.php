<?
include 'db_connection';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['submit']) {
    $nama_produk = $_POST['nama_produk'];
    $harga= $_POST['harga'];
    $stok = $_POST['stok'];

    $sql = "INSERT INTO products (nama_produk, harga, stok) VALUES
    ($nama_produk, $harga, $stok)";

    if ( $conn -> query($sql) === true) {
        echo "Produk  berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Produk</h1>
    <form action="" method="post">
        <label for="nama_produk">Nama Produk: </label>
        <input type="text" id="nama_produk" name="nama_produk" required>
        <br><br>
        <label for="harga_produk">Harga Produk</label>
        <input type="number" id="harga" name="harga" required>
        <label for="stok">Stok</label>
        <input type="number" id="stok" name="stok" required>
        <br><br>
        <input type="submit" name="submit" value="Tambah Produk">


    </form>
</body>
</html>