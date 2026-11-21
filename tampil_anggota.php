<?php

require_once "koneksi.php";

$sql = "SELECT id, no_anggota, nama_lengkap, email, no_hp, jenis_anggota, alamat FROM anggota ORDER BY id ASC";
$hasil = mysqli_query($koneksi, $sql);

if (!$hasil) {
    die ("Gagal mengambil data anggota: " . htmlspecialchars(mysqli_error($koneksi)));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Daftar Anggota Perpustakaan</h1>

    <div class="aksi">
        <a href="form_anggota.php" class="tombol"> + Daftar Anggota Baru</a>
    </div>

    <?php if (mysqli_num_rows($hasil) > 0) { ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Anggota</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Jenis Anggota</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($hasil)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row["no_anggota"]); ?></td>
                    <td><?php echo htmlspecialchars($row["nama_lengkap"]); ?></td>
                    <td><?php echo htmlspecialchars($row["email"]); ?></td>
                    <td><?php echo htmlspecialchars($row["no_hp"]); ?></td>
                    <td><?php echo htmlspecialchars($row["jenis_anggota"]); ?></td>
                    <td><?php echo htmlspecialchars($row["alamat"]); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } else { ?>
    <p class=""kosong>Belum ada data anggota perpustakaan yang tersimpan.</p>
    <?php } ?>

    <?php
    mysqli_free_result($hasil);
    mysqli_close($koneksi);
    ?>
</body>
</html>