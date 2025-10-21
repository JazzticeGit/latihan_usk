<?php
include 'koneksi.php'; 
$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id=$id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-warning text-dark py-4">
                        <h3 class="mb-0 fw-bold">
                            <i class="bi bi-pencil-square me-2"></i>Edit Produk
                        </h3>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST">
                            <div class="mb-4">
                                <label for="nama_produk" class="form-label fw-semibold">
                                    <i class="bi bi-box-seam text-primary me-2"></i>Nama Produk
                                </label>
                                <input type="text" 
                                        class="form-control form-control-lg" 
                                        id="nama_produk" 
                                        name="nama_produk" 
                                        value="<?= htmlspecialchars($data['nama_produk']); ?>" 
                                        placeholder="Masukkan nama produk" 
                                        required>
                            </div>

                            <div class="mb-4">
                                <label for="harga" class="form-label fw-semibold">
                                    <i class="bi bi-cash-coin text-success me-2"></i>Harga
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-success text-white">Rp</span>
                                    <input type="number" 
                                            class="form-control" 
                                            id="harga" 
                                            name="harga" 
                                            value="<?= $data['harga']; ?>" 
                                            placeholder="0" 
                                            min="0" 
                                            required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="stok" class="form-label fw-semibold">
                                    <i class="bi bi-archive text-info me-2"></i>Stok
                                </label>
                                <input type="number" 
                                        class="form-control form-control-lg" 
                                        id="stok" 
                                        name="stok" 
                                        value="<?= $data['stok']; ?>" 
                                        placeholder="Jumlah stok" 
                                        min="0" 
                                        required>
                            </div>

                            <div class="alert alert-info border-0" role="alert">
                                <i class="bi bi-info-circle me-2"></i>
                                <small>Anda sedang mengedit produk dengan ID: <strong><?= $data['id']; ?></strong></small>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" name="update" class="btn btn-warning btn-lg text-dark fw-semibold">
                                    <i class="bi bi-check-circle me-2"></i>Update Produk
                                </button>
                                <a href="index.php" class="btn btn-outline-secondary btn-lg">
                                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Produk
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['update'])) {
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
        $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
        $stok = mysqli_real_escape_string($koneksi, $_POST['stok']);

        $update = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama', harga='$harga', stok='$stok' WHERE id=$id");

        if ($update) {
            echo "<script>alert('Data berhasil diubah!');window.location='index.php';</script>";
        } else {
            echo "<div class='position-fixed top-0 start-50 translate-middle-x mt-3' style='z-index: 9999;'>
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <i class='bi bi-exclamation-triangle me-2'></i>
                        <strong>Error:</strong> " . mysqli_error($koneksi) . "
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    </div>
                    </div>";
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>