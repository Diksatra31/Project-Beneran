<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tengah</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    /* Global styles */
body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Membuat halaman penuh tinggi layar */
    font-family: Arial, sans-serif;
    background-color: #f4f4f4; /* Warna latar belakang */
}

/* Container untuk form */
.form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

/* Form styling */
.form {
    display: flex;
    gap: 50px; /* Jarak antara input kiri dan kanan */
}

/* Input styling */
input[type="text"] {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 200px; /* Lebar input */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

input[type="text"]:focus {
    outline: none;
    border-color: #007bff; /* Warna border saat fokus */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

</style>
<body>
    <div class="form-container">
        <form class="form">
            <input type="text" placeholder="Input Kiri" class="input-left">
            <input type="text" placeholder="Input Kanan" class="input-right">
        </form>
    </div>
</body>
</html>
