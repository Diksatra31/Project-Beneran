<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
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
    background: linear-gradient(to right,rgb(17, 20, 203), #2575fc);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    animation: gradientAnimation 10s ease infinite;
}

/* Container */
.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
}

/* Login Box */
.login-box {
    background-color: #fff;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    text-align: center;
    width: 100%;
    max-width: 400px;
}

/* Title */
.login-box h2 {
    margin-bottom: 10px;
    color: #333;
    font-size: 24px;
}

/* Subtitle */
.login-box p {
    margin-bottom: 20px;
    color: #666;
    font-size: 14px;
}

/* Input Group */
.input-group {
    margin-bottom: 15px;
    text-align: left;
    margin-left: -20px;
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
}

/* Button */
.btn-login {
    display: block;
    width: 100%;
    background-color:rgb(17, 85, 203);
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background 1s;
}

.btn-login:hover {
    background-color: #2575fc;
}

/* Bottom Text */
.bottom-text {
    margin-top: 15px;
    font-size: 14px;
    color: #666;
}

.bottom-text a {
    color: #6a11cb;
    text-decoration: none;
    font-weight: bold;
}

.bottom-text a:hover {
    text-decoration: underline;
}

</style>

<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Selamat Datang</h2>
            <p>Masuk untuk melanjutkan</p>
            <form action="proses_login.php" method="POST">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
                </div>
                <div class="input-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
                </div>
                <button type="submit" class="btn-login">Masuk</button>
            </form>
            <div class="bottom-text">
                <!-- <p>Belum punya akun? <a href="registrasi.php">Daftar Sekarang</a></p> -->
            </div>
        </div>
    </div>
</body>
</html>
