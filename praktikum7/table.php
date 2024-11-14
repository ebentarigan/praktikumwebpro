
<?php 
include 'db_conection.php';

//create table product

$query = "CREATE TABLE IF NOT EXISTS products (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(255) NOT NULL,
    harga INT NOT NULL,
    stok INT NOT NULL
)";

//chech connection

if ($conn -> query($query)=== TRUE){
    echo "Table Product created succesfully";
}else{
    echo "error creating table : " .$conn -> error;
}

// Stop connection
$conn->close();
?>
