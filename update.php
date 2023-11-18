<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel= "stylesheet" href = "Style_update.css">
</head>
<body>
<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id =$_GET['nim'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kode_prodi = $_POST['kode_prodi'];

    $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', kode_prodi='$kode_prodi' WHERE nim='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: read.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $nim = $_GET['nim'];
    $sql = "SELECT * FROM mahasiswa WHERE nim=$nim";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nim = $row['nim'];
        $nama = $row['nama'];
        $kode_prodi = $row['kode_prodi'];
    } else {
        echo "Data tidak ditemukan";
    }
}
?>

<form method="post" action="update.php?nim=<?php echo $nim ?>">
    NIM: <input type="text" name="nim" value="<?php echo $nim; ?>"><br>
    Nama: <input type="text" name="nama" value="<?php echo $nama; ?>"><br>
    Kode Prodi: <input type="text" name="kode_prodi" value="<?php echo $kode_prodi; ?>"><br>
    <input type="submit" value="Ubah Data">
</form>
</body>
</html>



