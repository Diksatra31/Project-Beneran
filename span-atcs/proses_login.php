<?php
include 'koneksi.php';

session_start(); // Memulai session

$host = 'localhost';
$user = 'root';
$password = 'root'; // Sesuaikan dengan password MySQL Anda
$database = 'span-atcs'; // Ganti dengan nama database Anda

$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Ambil data dari database registrasi
    $sql = "SELECT * FROM registrasi WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Simpan data ke session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            // Redirect ke halaman dashboard
            echo "<script>
                    alert('Login berhasil!');
                    window.location.href = 'dsbr-regdokumen.php';
                  </script>";
            $stmt->close();
            $conn->close();
            exit();
        } else {
            echo "<script>
                    alert('Password salah!');
                    window.location.href = 'login.php';
                  </script>";
            $stmt->close();
            $conn->close();
            exit();
        }
    } else {
        echo "<script>
                alert('Email tidak terdaftar!');
                window.location.href = 'login.php';
              </script>";
        $stmt->close();
        $conn->close();
        exit();
    }

    
} else {
    header("Location: login.php");
    exit();
}
?>
