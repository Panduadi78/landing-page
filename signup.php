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

    // Hash password sebelum menyimpannya ke database
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

    // Simpan ke database
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $hashed_password);
    if ($stmt->execute()) {
        echo "<script>alert('Pendaftaran berhasil!');</script>";
    } else {
        echo "<script>alert('Pendaftaran gagal!');</script>";
    }
    
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Pandu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup-container">
        <h2>Signup</h2>
        <form method="POST" action="signup.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required autocomplete="off" autofocus>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required autocomplete="off">

            <button type="submit">Signup</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
</body>
<style>
    /* Tambahkan latar belakang gradien yang sama */
    body {
        background: linear-gradient(135deg, #ff9800, #ff5722);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Arial, sans-serif;
        margin: 0;
    }

    /* Style untuk container form signup */
    .signup-container {
        width: 100%;
        max-width: 400px;
        margin: 20px;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.9); /* Transparan */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        border-radius: 15px;
        backdrop-filter: blur(10px); /* Efek blur */
    }

    /* Style untuk judul form signup */
    .signup-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-size: 24px;
        letter-spacing: 1px;
    }

    /* Style untuk input fields */
    .signup-container input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Style untuk tombol signup */
    .signup-container button {
        width: 100%;
        padding: 10px;
        background-color: #ff9800;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* Hover effect untuk tombol signup */
    .signup-container button:hover {
        background-color: #ff5722;
    }

    /* Style untuk link Login di bawah form */
    .signup-container p {
        text-align: center;
        margin-top: 20px;
        color: #666;
    }

    /* Style untuk link Login */
    .signup-container p a {
        color: #ff9800;
        text-decoration: none;
        font-weight: bold;
    }

    /* Hover effect untuk link Login */
    .signup-container p a:hover {
        color: #ff5722;
        text-decoration: underline;
    }
</style>
</html>
