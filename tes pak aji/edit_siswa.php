<?php
include('koneksi.php'); // Koneksi ke database

// Cek apakah ada ID yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data siswa berdasarkan ID
    $query = "SELECT * FROM siswa WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}

// Update data siswa
if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    // Query untuk update data siswa
    $update_query = "UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas', jurusan='$jurusan' WHERE id=$id";
    if (mysqli_query($conn, $update_query)) {
        header('Location: index.php'); // Redirect ke halaman utama setelah update
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container edit-container">
        <h1>Edit Data Siswa</h1>

        <form action="edit_siswa.php?id=<?php echo $data['id']; ?>" method="POST">
            <label for="nis">NIS:</label><br>
            <input type="text" name="nis" value="<?php echo $data['nis']; ?>" required><br><br>

            <label for="nama">Nama Lengkap:</label><br>
            <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required><br><br>

            <label for="kelas">Kelas:</label><br>
            <input type="text" name="kelas" value="<?php echo $data['kelas']; ?>" required><br><br>

            <label for="jurusan">Jurusan:</label><br>
            <input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>" required><br><br>

            <button type="submit" name="submit">Update Siswa</button>
        </form>
    </div>
</body>
</html>
