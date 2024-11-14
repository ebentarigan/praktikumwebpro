<?php 
$host = 'localhost';
$username = 'root';
$password ='';
$dbname ='toko_online';

$conn=new mysqli($host,$username,$password,$dbname);
if ($conn -> connect_error){
    die("connection failed : " . $conn -> connect_error);
}
echo "connection succes <br>";