<?php
session_start();
include 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = '$role'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        $_SESSION['user_id'] = $result->fetch_assoc()['id'];

        if ($role == 'admin') {
            header("Location: admin/dashboard.php");
        } elseif ($role == 'manajemen') {
            header("Location: manajemen/dashboard.php");
        } else {
            header("Location: user/dashboard.php");
        }
    } else {
        echo "<script>alert('Login gagal!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi CNT Carwash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-fluid vh-100 bg-image">
        <div class="row h-100">
            <!-- Bagian Kiri dengan Gambar -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="p-4" style="max-width: 400px; width: 100%;">
                    <h1 style="font-size: 55px; color: purple;">Absensi</h1>
                    <h1>CNT Carwash</h1>
                </div>
            </div>

            <!-- Bagian Kanan dengan Form Login -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%;">
                    <h2 class="text-center mb-4">Sign In</h2>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Role</label>
                            <select name="role" class="form-select" aria-label="Default select example">
                                <option value="admin">Admin</option>
                                <option value="manajemen">Manajemen</option>
                                <option value="user">Karyawan</option>
                            </select>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </form>
                    <!-- <div class="text-center mt-3">
                        <a href="#">Forgot password?</a>
                        <p class="mt-2">Don’t have an account? <a href="#">Register here</a></p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
