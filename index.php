<?php 
    include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Toko Sederhana</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white py-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0 fw-bold">
                                <i class="bi bi-shop me-2"></i>Daftar Produk
                            </h3>
                            <a href="tambah.php" class="btn btn-light btn-lg">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Produk
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mb-0 align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="8%" class="text-center">ID</th>
                                        <th width="35%">Nama Produk</th>
                                        <th width="20%" class="text-center">Harga</th>
                                        <th width="12%" class="text-center">Stok</th>
                                        <th width="25%" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id DESC");
                                    if (mysqli_num_rows($result) > 0) :
                                        while ($row = mysqli_fetch_assoc($result)) :
                                    ?>
                                    <tr>
                                        <td class="text-center">
                                            <span class="badge bg-secondary fs-6"><?= $row['id']; ?></span>
                                        </td>
                                        <td>
                                            <i class="bi bi-box-seam text-primary me-2"></i>
                                            <strong><?= htmlspecialchars($row['nama_produk']); ?></strong>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-success fs-6 px-3 py-2">
                                                Rp <?= number_format($row['harga'], 0, ',', '.'); ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-info text-dark fs-6 px-3 py-2">
                                                <?= $row['stok']; ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-square me-1"></i>Edit
                                                </a>
                                                <a href="hapus.php?id=<?= $row['id']; ?>" 
                                                   class="btn btn-danger btn-sm" 
                                                   onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                                    <i class="bi bi-trash me-1"></i>Hapus
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php 
                                        endwhile;
                                    else:
                                    ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <div class="text-muted">
                                                <i class="bi bi-inbox display-1 d-block mb-3"></i>
                                                <h5>Belum ada data produk</h5>
                                                <p class="mb-0">Klik tombol "Tambah Produk" untuk menambahkan data</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center py-3">
                        <small><i class="bi bi-info-circle me-1"></i>Total Produk: <strong><?= mysqli_num_rows($result); ?></strong></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>