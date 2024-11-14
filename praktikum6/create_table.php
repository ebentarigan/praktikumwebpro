<?php
include 'connection.php';
if($conn-> query("CREATE DATABASE IF NOT EXISTS universitas") === TRUE){
    echo "Database 'universitas' berhasil dibuat aatau sudah ada.<br>";
}else {
    echo "error membuat database : ". $conn->error."<br>";
}

$conn -> select_db(database :"universitas");
//
$sql_mahasiswa="
    CREATE TABLE IF NOT EXISTS mahasiswa(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    nim VARCHAR(20) NOT NULL UNIQUE,
    jurusan VARCHAR(50) NOT NULL,
    angkatan INT(4) NOT NULL)";

if ($coon -> query($sql_mahasiswa)=== TRUE){
    echo "Tabel 'mahasiswa' berhasil dibuat atau sudah ada .<br>";
}else{
    echo "error membuat tabel mahasiswa" $conn -> error . "<br>";
}
//
$sql_mata_kuliah ="
    CREATE TABLE IF NOT EXISTS mata_kuliah(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    kode_mk VARCHAR(10) NOT NULL UNIQUE,
    nama_mk VARCHAR(100) NOT NULL ,
    sks INT(2) NOT NULL)";

if ($coon -> query($sql_mata_kuliah)=== TRUE){
    echo "Tabel 'mata kuliah' berhasil dibuat atau sudah ada .<br>";
}else{
    echo "error membuat tabel mata kuliah" $conn -> error . "<br>";
}
//
$sql_krs="
    CREATE TABLE IF NOT EXISTS krs(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    mahasiswa_id INT(11),
    mata_kuliah_id INT(11),
    semester INT(2),
    FOREIGN KEY (mahasiswa_id) REFERENCES mahasiswa(id) ON DELETE CASCADE;
    FOREIGN KEY (mata_kuliah_id) REFERENCES mata_kuliah(id) ON DELETE CASCADE)";

    if ($coon -> query($sql_krs)=== TRUE){
        echo "Tabel 'mata kuliah' berhasil dibuat atau sudah ada .<br>";
    }else{
        echo "error membuat tabel mata kuliah" $conn -> error . "<br>";
    }
//
$sql_insert_mahasiswa ="
    INSERT INTO mahasiswa (nama,nim,jurusan,angkatan) VALUES
    ('alya Rahma','2200101','Sistem Informasi',2021),
    ('alya Rahma','2200102','Teknik Informatika',2022),
    ('alya Rahma','2200103','Sistem Informasi',2023),
    ('alya Rahma','2200104','Sistem Informasi',2022),
    ('alya Rahma','2200105','Teknik Informatika',2021)
    ON DUPLICATE KEY UPDATE nama = VALUES(nama)";

    if ($coon -> query($sql_insert_mahasiswa)=== TRUE){
        echo "Data contoh ke tabel 'mahasiswa' berhasil dimasukkan.<br>";
    }else{
        echo "error memasukkan data tabel mahasiswa" $conn -> error . "<br>";
    }
//
$sql_insert_mata_kuliah ="
    INSERT INTO mata_kuliah (kode_mk,nama_mk,sks) VALUES
    ('IF101','Algoritma dan Pemograman',3),
    ('IF102','Arsitektur dan Jaringan Komputer',3),
    ('IF101','Pengantar Sitem Informasi',2)
    ON DUPLICATE KEY UPDATE nama_mk = VALUES(nama_mk)
";
    if ($coon -> query($sql_insert_mata_kuliah)=== TRUE){
        echo "Data contoh ke tabel 'mata kuliah' berhasil dimasukkan.<br>";
    }else{
        echo "error memasukkan data tabel mata kuliah" $conn -> error . "<br>";
    }
$sql_insert_krs ="
    INSERT INTO krs(mahasiswa_id ,mata_kuliah,semester) VALUES
    (1,1,1), -- Alya Rahma mengambil Algoritma dan Pemograman di semester 1
    (1,2,1), -- Alya Rahma mengambil Arsitektur dan jaringan Komputer di semester 1
    (1,3,2), -- budi Santoso mengambil Pengantar Sistem Informasi di semester 2
    ON DUPLICATE KEY UPDATE semester = VALUES(semester)
    ";

    if ($coon -> query($sql_insert_krs)=== TRUE){
        echo "Data contoh ke tabel 'krs' berhasil dimasukkan.<br>";
    }else{
        echo "error memasukkan data tabel krs" $conn -> error . "<br>";
    }

$conn -> close();
?>