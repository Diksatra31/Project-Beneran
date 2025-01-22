<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
/* Animasi Background */
@keyframes gradientAnimation {
    0% {
        background: linear-gradient(45deg,rgb(61, 48, 203),rgb(142, 53, 184));
    }
    50% {
        background: linear-gradient(45deg,rgb(123, 85, 163), #2575fc);
    }
    100% {
        background: linear-gradient(45deg,rgb(95, 135, 255),rgb(114, 101, 253));
    }
}

    /* Reset Styles */
body, html {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
    background: linear-gradient(to left,rgb(68, 26, 151),rgb(34, 42, 198));
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    animation: gradientAnimation 15s ease infinite;
}

/* Container */
.register-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
}

/* Register Box */
.register-box {
    background-color: #fff;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    text-align: center;
    width: 100%;
    max-width: 400px;
}

/* Title */
.register-box h2 {
    margin-bottom: 10px;
    color: #333;
    font-size: 24px;
}

/* Subtitle */
.register-box p {
    margin-bottom: 20px;
    color: #666;
    font-size: 14px;
}

/* Input Group */
.input-group {
    margin-bottom: 15px;
    text-align: left;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
    color: #333;
    font-size: 14px;
    font-weight: bold;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    margin-left:-10px ;
}

/* Button */
.btn-register {
    display: block;
    width: 100%;
    background-color:rgb(29, 44, 180);
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s;
}

.btn-register:hover {
    background-color:rgb(99, 127, 237);
}

/* Bottom Text */
.bottom-text {
    margin-top: 15px;
    font-size: 14px;
    color: #666;
}

.bottom-text a {
    color:rgb(99, 127, 237);
    text-decoration: none;
    font-weight: bold;
}

.bottom-text a:hover {
    text-decoration: underline;
}

</style>

<body>
    <div class="register-container">
        <div class="register-box">
            <h2>Buat Akun</h2>
            <p>Daftar untuk memulai</p>
            <form action="proses_register.php" method="POST">
                <div class="input-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
                </div>
                <div class="input-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" name="password" placeholder="Buat kata sandi" required>
                </div>
                <div class="input-group">
                    <label for="confirm-password">Konfirmasi Kata Sandi</label>
                    <input type="password" id="confirm-password" name="confirm_password" placeholder="Ulangi kata sandi" required>
                </div>
                <button type="submit" class="btn-register">Daftar</button>
            </form>
            <div class="bottom-text">
                <p>Sudah punya akun? <a href="login.php">Masuk Sekarang</a></p>
            </div>
        </div>
    </div>
</body>
</html>
