<?php
// form_anggota.php - Form pendaftaran anggota perpustakaan
$status = isset($_GET["status"]) ? $_GET["status"] : "";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Anggota Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Pendaftaran Anggota Perpustakaan</h1>

    <?php if ($status === "sukses") { ?>
        <p class="sukses">Data anggota perpustakaan berhasil disimpan.</p>
    <?php } ?>

    <form action="proses_anggota.php" method="post">
        <label for="no_anggota">Nomor Anggota</label>
        <input type="text" id="no_anggota" name="no_anggota">

        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap">

        <label for="email">Email</label>
        <input type="text" id="email" name="email">

        <label for="no_hp">Nomor HP</label>
        <input type="text" id="no_hp" name="no_hp">

        <label for="jenis_anggota">Jenis Anggota</label>
        <select id="jenis_anggota" name="jenis_anggota">
            <option value="">-- Pilih Jenis Anggota --</option>
            <option value="Mahasiswa">Mahasiswa</option>
            <option value="Dosen">Dosen</option>
            <option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
        </select>

        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat" rows="4"></textarea>

        <br>
        <button type="submit">Simpan</button>
    </form><br><br>

    <div class="navigasi">
        <a href="tampil_anggota.php">Lihat Daftar Anggota Perpustakaan</a>
    </div>
</body>
</html>