<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
session_start(); // Panggil session_start() di awal

if (isset($_POST['submit'])) {
    require_once 'dbkoneksi.php';

    $user = $dbh->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $user->execute([
        $_POST['email'],
        $_POST['password']
    ]);

    $count = $user->rowCount(); // untuk memastikan user tersedia atau tidak

    if ($count > 0) {
        $_SESSION['user'] = $user->fetch();
        header("location:dashboard.php");
        exit(); // tambahkan exit() setelah header untuk memastikan tidak ada kode ekstra yang dijalankan setelah pengalihan
    } else { // jika gagal login
        header("location:login.php");
    }
}
?>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">My Website</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
        </ul>
    </nav>
    <!-- Navbar -->

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Masuk Akun</h3>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <?php if (isset($error)): ?> <!-- Tampilkan pesan kesalahan jika ada -->
                                <p><?php echo $error; ?></p>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Masuk
                                sekarang!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>