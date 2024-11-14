<?php 
include 'db_conection.php';

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

// Mengambil semua data sebagai array asosiatif
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
</head>
<body>
    <h1>Daftar Produk</h1>
    <a href="">Tambah produk</a>
    <?php
    if(empty($data)){
        echo "gada data";
        exit;
    }
    ?>
    <table >
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($data as $item) : ?>
        <tr>
            <td><?= $item['id_produk']; ?></td>
            <td><?= $item['nama_produk']; ?></td>
            <td><?= $item['harga']; ?></td>
            <td><?= $item['stok']; ?></td>
            <td>
                <a href="edit_product.php?id=<?= $item['id_produk']; ?>">Edit</a>
                <a href="delete_product.php?id=<?= $item['id_produk']; ?>"
                   onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
