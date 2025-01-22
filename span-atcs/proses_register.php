<?php
$host = 'localhost';
$user = 'root';
$password = 'root'; // Sesuaikan dengan password MySQL Anda
$database = 'span-atcs'; // Ganti dengan nama database Anda

$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO registrasi (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        // Jika registrasi berhasil, tampilkan popup menggunakan JavaScript
        echo "<script>
                alert('Registrasi berhasil!');
                window.location.href = 'login.php'; // Arahkan ke login.php
              </script>";
        exit();
    } else {
        echo "Gagal registrasi: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
