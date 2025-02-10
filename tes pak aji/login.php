<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Menambahkan link ke file CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>

        <?php
        session_start();

        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Username dan password statis (untuk keperluan demo)
            if ($username == 'admin' && $password == 'admin123') {
                $_SESSION['login'] = true;
                header('Location: index.php'); // Redirect ke halaman utama
                exit();
            } else {
                echo "Username atau password salah!";
            }
        }
        ?>

        <form action="" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" required><br><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required><br><br>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
