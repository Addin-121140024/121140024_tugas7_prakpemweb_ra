<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kode_prodi = $_POST['kode_prodi'];

    $sql = "INSERT INTO mahasiswa (nim, nama, kode_prodi) VALUES ('$nim', '$nama', '$kode_prodi')";

    if (mysqli_query($conn, $sql)) {
        header("Location: read.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
else{
    echo "gagal";
}
?>
