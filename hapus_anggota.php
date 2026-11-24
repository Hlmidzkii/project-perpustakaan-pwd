<?php
require_once "koneksi.php";

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: tampil_anggota.php");
        exit;
    } 

    $id_no = $_POST['no_id'];

    if (!isset($id_no) || !ctype_digit((string)$id_no)) {
    die("ID anggota tidak valid");
    }


    $sql = "DELETE FROM anggota WHERE id = ?";

    $stmt = mysqli_prepare($koneksi, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id_no);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("Location: tampil_anggota.php");
        exit;
    } else {
        die("Gagal menghapus data". mysqli_stmt_error($stmt));
    }
?>