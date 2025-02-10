<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <!-- Menambahkan link ke file CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Data Siswa</h1>

        <?php
        include('koneksi.php'); // Koneksi ke database

        if (isset($_POST['submit'])) {
            $nis = $_POST['nis'];
            $nama = $_POST['nama'];
            $kelas = $_POST['kelas'];
            $jurusan = $_POST['jurusan'];

            // Query untuk memasukkan data siswa
            $sql = "INSERT INTO siswa (nis, nama, kelas, jurusan) VALUES ('$nis', '$nama', '$kelas', '$jurusan')";
            if (mysqli_query($conn, $sql)) {
                echo "Data siswa berhasil ditambahkan!";
                header('Location: index.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        ?>

        <form action="tambah_siswa.php" method="POST">
            <label for="nis">NIS:</label><br>
            <input type="text" name="nis" id="nis" required><br><br>
            <label for="nama">Nama Lengkap:</label><br>
            <input type="text" name="nama" id="nama" required><br><br>
            <label for="kelas">Kelas:</label><br>
            <input type="text" name="kelas" id="kelas" required><br><br>
            <label for="jurusan">Jurusan:</label><br>
            <input type="text" name="jurusan" id="jurusan" required><br><br>
            <button type="submit" name="submit">Tambah Siswa</button>
        </form>
    </div>
</body>
</html>
