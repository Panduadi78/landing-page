<?php
session_start();

// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti sesuai konfigurasi MySQL
$password = "";     // Ganti sesuai konfigurasi MySQL
$dbname = "pandu_login"; // Nama database

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menangani pengiriman form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Cek user di database
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Cek apakah password di DB dan password yang dimasukkan cocok
        if (password_verify($pass, $row['password'])) {
            // Login berhasil
            $_SESSION['username'] = $user;
            header("Location: index.php");
            exit();
        } else {
            // Password salah
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        // Username tidak ditemukan
        echo "<script>alert('Username tidak ditemukan!');</script>";
    }
    
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pandu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required autocomplete="off" autofocus>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required autocomplete="off">

            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="signup.php">Signup</a></p>
        <p><a href="index.php" class="back-home">Back Home</a></p>
    </div>
</body>
<style>
    /* Tambahkan latar belakang gradien */
    body {
        background: linear-gradient(135deg, #ff9800, #ff5722);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Arial, sans-serif;
        margin: 0;
    }

    /* Style untuk container form login */
    .login-container {
        width: 100%;
        max-width: 400px;
        margin: 20px;
        padding: 20px;
        background: linear-gradient(145deg, #f1f1f1, #ffffff);
        box-shadow: 0 9px 20px rgba(0, 0, 0, 0.2);
        border-radius: 20px;
        backdrop-filter: blur(10px); /* Efek blur pada latar belakang */
    }

    /* Style untuk judul form login */
    .login-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-size: 24px;
        letter-spacing: 1px;
    }

    /* Style untuk input fields */
    .login-container input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Style untuk tombol login */
    .login-container button {
        width: 100%;
        padding: 10px;
        background-color: #ff9800;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* Hover effect untuk tombol login */
    .login-container button:hover {
        background-color: #ff5722;
    }

    /* Style untuk link Signup di bawah form */
    .login-container p {
        text-align: center;
        margin-top: 20px;
        color: #666;
    }

    /* Style untuk link Signup */
    .login-container p a {
        color: #ff9800;
        text-decoration: none;
        font-weight: bold;
    }

    /* Hover effect untuk link Signup */
    .login-container p a:hover {
        color: #ff5722;
        text-decoration: underline;
    }

    /* Style untuk link Back Home */
    .login-container .back-home {
        display: block;
        text-align: center;
        margin-top: 10px;
        color: #ff9800;
        font-weight: bold;
        text-decoration: none;
    }

    /* Hover effect untuk link Back Home */
    .login-container .back-home:hover {
        color: #ff5722;
        text-decoration: underline;
    }
</style>
</html>
