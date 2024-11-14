<?php
include 'connection.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

$query = "SELECT m.id, m.nama, m.nim, m.jurusan, m.angkatan. mk.nama, mk.kode_mk, krs.semester
    FROM mahasiswa m
    LEFT JOIN krs ON m.id = krs.mahasiswa_id
    LEFT JOIN mata_kuliah mk ON krs.mata_kuliah_id = mk.id
    WHERE m.nama LIKE '%{$search}%' OR m.nim LIKE '%{$search}%'";
    $result = $conn->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa dan Mata Kuliah</title>
</head>
<body>
    <h1>Data Mahasiswa dan Mata Kuliah</h1>
    <form action="index.php" method="GET">
        <input type="text"  name="search" placeholder="Cari nama atau NIM" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Cari</button>
    </form>
    
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Angkatan</th>
            <th>Mata Kuliah</th>
            <th>Kode MK</th>
            <th>Semester</th>
        </tr>
        <?php foreach ($data as $row) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['nim']; ?></td>
                <td><?php echo $row['jurusan']; ?></td>
                <td><?php echo $row['angkatan']; ?></td>
                <td><?php echo $row['nama_mk']; ?></td>
                <td><?php echo $row['kode_mk']; ?></td>
                <td><?php echo $row['semester']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>