<?php 

    include 'koneksi.php'; 


?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Toko Sederhana</title>
    <style>
        table { border-collapse: collapse; width: 70%; margin: 20px auto; }
        th, td { border: 1px solid #888; padding: 8px; text-align: center; }
        th { background-color: #ccc; }
        a { text-decoration: none; color: blue; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Daftar Produk</h2>
    <center><a href="tambah.php">➕ Tambah Produk</a></center>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
        <?php
        $result = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($result)) :
        ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nama_produk']; ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
            <td><?= $row['stok']; ?></td>
            
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
