<?php

require_once "koneksi.php";

$id = $_GET['id'];

$sql = "SELECT * FROM anggota WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$hasil = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($hasil) == 0) {
    die ("Data anggota tidak ditemukan");
}

$row = mysqli_fetch_assoc($hasil);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h2>Edit Data Anggota</h2>
    <form action="proses_update.php" method="post">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">

        <label for="">Nomor Anggota</label>
        <input type="text" name="no_anggota" value="<?= htmlspecialchars($row['no_anggota']); ?>" maxlength="15" required>

        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" value="<?= htmlspecialchars($row["nama_lengkap"]); ?>" maxlength="15" required>

        <label for="email">Email</label>
        <input type="text" name="email" value="<?= htmlspecialchars($row["email"]); ?>" maxlength="15" required>

        <label for="no_hp">Nomor HP</label>
        <input type="text"  name="no_hp" value="<?= htmlspecialchars($row["no_hp"]); ?>" maxlength="15" required>

        <label for="jenis_anggota">Jenis Anggota</label>
        <select name="jenis_anggota" required>
            <option value="">-- Pilih Jenis Anggota --</option>
            <option value="Mahasiswa" <?= $row['jenis_anggota'] == "Mahasiswa" ? "selected" : ""; ?>>
                Mahasiswa</option>
            <option value="Dosen" <?= $row['jenis_anggota'] == "Dosen" ? "selected" : ""; ?>>
                Dosen</option>
            <option value="Tenaga Kependidikan" <?= $row['jenis_anggota'] == "Tenaga Kependidikan" ? "selected" : ""; ?>>
                Tenaga Kependidikan</option>
        </select>
        <br><br>
        <label>Alamat</label><br>
        <textarea name="alamat" rows="4" cols="40" required>
            <?= htmlspecialchars($row['alamat']); ?>
        </textarea>
        <br><br>

        <button type="submit" name="update">
            Update Data
        </button>
        <br>

        <a href="tampil_anggota.php">Kembali</a>
    </form>
</body>
</html>