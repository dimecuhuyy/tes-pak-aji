<?php
include('koneksi.php'); // Koneksi ke database
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['login'])) {
    header('Location: login.php'); // Redirect ke halaman login jika belum login
    exit();
}

// Query untuk mengambil semua data siswa
$query = "SELECT * FROM siswa";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Daftar Siswa</h1>
            <a href="logout.php">Logout</a>
        </div>

        <!-- Tombol untuk menambah siswa -->
        <div>
            <a href="tambah_siswa.php"><button type="button">Tambah Siswa</button></a>
        </div>

        <!-- Tabel Daftar Siswa -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan data siswa
                $no = 1;
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$no}</td>";
                    echo "<td>{$data['nis']}</td>";
                    echo "<td>{$data['nama']}</td>";
                    echo "<td>{$data['kelas']}</td>";
                    echo "<td>{$data['jurusan']}</td>";
                    echo "<td>
                            <a href='edit_siswa.php?id={$data['id']}'>Edit</a> / 
                            <a href='hapus_siswa.php?id={$data['id']}'>Hapus</a>
                          </td>";
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
