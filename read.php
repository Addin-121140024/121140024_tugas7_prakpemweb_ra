<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel= "stylesheet" href = "Style.css">
</head>
<body>

    <h2>Data Mahasiswa</h2>

    <form method="post" action="create.php">
        NIM: <input type="text" name="nim"><br>
        Nama: <input type="text" name="nama"><br>
        Kode Prodi: <input type="text" name="kode_prodi"><br>
        <input type="submit" value="Tambah Data">
    </form>

    <div class="search-container">
        <form action="./read.php" method="get">
            <select name="search" id="">
                <option value="IF">Teknik Informatika</option>
                <option value="EL">Teknik Elektro</option>
                <option value="PWK">Perencanaan Wilayah Kota</option>
            </select>
            <input type="submit" value="Cari" id="">
        </form>
    </div>

    <table>
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Kode Prodi</th>
        <th>Aksi</th>
    </tr>
    <?php
        include 'koneksi.php';

        if(!empty($_GET["search"])){
            $search = $_GET["search"];
            $sql = "SELECT * FROM mahasiswa WHERE kode_prodi = '$search'";
        }
        else
            $sql = "SELECT * FROM mahasiswa";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["nim"]."</td>
                        <td>".$row["nama"]."</td>
                        <td>".$row["kode_prodi"]."</td>
                        <td><a href='update.php?nim=".$row["nim"]."'>Update</a> | <a href='delete.php?nim=".$row["nim"]."'>Delete</a></td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>
    </table>

    <script>
    function showDropdown() {
        document.getElementById("searchDropdown").style.display = "block";
    }

    function search(value) {
        console.log("Pencarian untuk: " + value);
        window.location.href = './read.php?search=' + value;
    }

    // Tutup dropdown ketika klik di luar
    window.onclick = function(event) {
        if (!event.target.matches('#searchBar')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display == "block") {
                    openDropdown.style.display = "none";
                }
            }
        }
    }
</script>

</body>
</html>



