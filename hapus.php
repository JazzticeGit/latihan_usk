<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM produk WHERE id=$id";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>alert('Data berhasil dihapus!');window.location='index.php';</script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
