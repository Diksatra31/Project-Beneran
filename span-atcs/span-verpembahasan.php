<?php 
include 'koneksi.php';

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pengembang = mysqli_real_escape_string($conn, $_POST['pengembang']);
    $individual = mysqli_real_escape_string($conn, $_POST['individual']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $appointment = mysqli_real_escape_string($conn, $_POST['appointment']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);

    // Validasi file 
    $allowed_ext = ['pdf']; // hanya ekstensi PDF yang diperbolehkan
    $allowed_mime = ['application/pdf']; // MIME type untuk PDF
    $file_bukti_pembayaran = $_FILES['file_bukti_pembayaran'];
    $file_permohonan = $_FILES['file_permohonan'];

    // Cek jika file diupload tanpa error
    if ($file_bukti_pembayaran['error'] === 0 && $file_permohonan['error'] === 0) {
        $ext1 = strtolower(pathinfo($file_bukti_pembayaran['name'], PATHINFO_EXTENSION));
        $ext2 = strtolower(pathinfo($file_permohonan['name'], PATHINFO_EXTENSION));

        // Validasi ekstensi file (hanya PDF yang diizinkan)
        if (!in_array($ext1, $allowed_ext) || !in_array($ext2, $allowed_ext)) {
            echo "<script>alert('Hanya file dengan format PDF yang diizinkan.');</script>";
            exit;
        }

        // Validasi MIME type (hanya file PDF yang sah)
        $file_type1 = mime_content_type($file_bukti_pembayaran['tmp_name']);
        $file_type2 = mime_content_type($file_permohonan['tmp_name']);

        // Validasi ukuran file (maksimal 100MB)
        if ($file_bukti_pembayaran['size'] > 100 * 1024 * 1024 || $file_permohonan['size'] > 100 * 1024 * 1024) {
            echo "<script>alert('Ukuran file tidak boleh lebih dari 100MB.');</script>";
            exit;
        }

        // Tentukan direktori untuk upload file
        $upload_dir = 'uploads/';
        $file_name1 = $upload_dir . uniqid() . '.' . $ext1;
        $file_name2 = $upload_dir . uniqid() . '.' . $ext2;

        // Pindahkan file ke direktori upload
        if (move_uploaded_file($file_bukti_pembayaran['tmp_name'], $file_name1) && move_uploaded_file($file_permohonan['tmp_name'], $file_name2)) {
            // Simpan data ke database
            $query = "INSERT INTO verpembahasan (email, pengembang, nama_konsultan, alamat_lengkap, appointment, jam, file_bukti_pembayaran, file_permohonan, created_at) 
                      VALUES ('$email', '$pengembang', '$individual', '$alamat', '$appointment', '$time', '$file_name1', '$file_name2', NOW())";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Data berhasil disimpan.'); window.location.href = 'span-verpembahasan.php';</script>";
                exit;
            } else {
                echo "<script>alert('Gagal menyimpan data ke database.');</script>";
            }
        } else {
            echo "<script>alert('Gagal memindahkan file.');</script>";
        }
    } else {
        echo "<script>alert('File tidak berhasil diupload.');</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---font google-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!--feather icon-->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"/>
    <script src="https://unpkg.com/feather-icons"></script>
    <!--My Style-->
    <link rel="stylesheet" href="css/style.css" />

    <style>
    form {
        display: flex;
        flex-direction: column; /* Mengatur elemen form ke bawah */
        max-width: 400px; /* Batasi lebar form */
        margin: 30px auto; /* Pusatkan form di tengah layar */
    }

    label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    input, textarea, button {
        margin-bottom: 15px;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background-color: #3498db;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Navbar Style */
        .navbar{
            display: flex; /* Menggunakan Flexbox */
            background-color: #FDD100;
            padding: 14px 20px;
            padding-left: 20px; /* Jarak kiri */ 
            justify-content: center;
        }

        .text-container{
            padding-right: 20px; /* Jarak kanan */
        }  

        .navbar img {
            width: 50px; /* Mengubah ukuran logo menjadi 50px lebar */
            height: auto; /* Menjaga rasio gambar */
            border-radius: 10%; /* Membulatkan gambar menjadi lingkaran */
        }

        .navbar img:hover{
            background-color: antiquewhite;
        }

        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            color: black;
        }

        footer {
        background-color: #333; /* Warna latar belakang footer */
        color: white; /* Warna teks di footer */
        text-align: center; /* Teks rata tengah */
        padding: 20px; /* Jarak di dalam footer */
        position: relative; /* Posisi relatif agar footer tetap di bawah */
        bottom: 0;
        width: 100%; /* Footer memanjang sepanjang halaman */
        margin-top: 50px; /* Memberi jarak 50px di atas footer */
      }     
    </style>

    <title>Verifikasi Dan Pembahasan</title>
</head>
<body>
    <div class="navbar">
    <div class="logo"><img src="img/logospan.png"></div>
    <div style="margin-top:15px;margin-left:90px;">
        <a href="span-regdokumen.php" class="text-container"  href="">Registrasi Dan Dokumen</a>
        <a href="span-verpembahasan.php" class="text-container" style="color: #2980b9;"  href="">Verifikasi Dan Pembahasan</a> 
        <a href="span-asistensi.php" class="text-container" href="">Asistensi</a>
        <a href="span-dokfinal.php" class="text-container"  href="">Dokumen Final</a>  
    </div>   
       <a href="index.php" style="margin-left:110px;color:green;"><i data-feather="home"></i></a>
    </div> 
    
    <h1 style="text-align:center; margin-top: 50px;">Verifikasi Dan Pembahasan</h1>

    <form method="POST" enctype="multipart/form-data">
        
        <label for="name">Email:</label>
        <input type="text" id="email" name="email" placeholder="Masukkan email" required>

        <label for="name">Nama Pengembang/Pembangun:</label>
        <input type="text" id="pengembang" name="pengembang" placeholder="Masukkan Nama Pengembanng/Pembangun Anda" required>
        
        <label for="email">Nama Individual Konsultan:</label>
        <input type="text" id="individual" name="individual" placeholder="Masukkan Nama Individual Konsultan Anda" required>

        <label for="email">Alamat Lengkap:</label>
        <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat Lengkap Anda" required>

        <label for="tanggalSurat">Appointment:</label>
        <input type="date" id="appointment" name="appointment" required>

        <label for="time">Jam:</label>
        <input type="time" id="time" name="time" required>

        <label for="file_bukti_pembayaran">Upload Bukti Pembayaran Dan Lembar Kode Biling PNBP:</label>
        <input style="background-color: white;" type="file" id="file_bukti_pembayaran" name="file_bukti_pembayaran" accept=".pdf" required>

        <label for="file_permohonan">Upload Surat Permohonan:</label>
        <input style="background-color: white;" type="file" id="file_permohonan" name="file_permohonan" accept=".pdf" required>

        <div style="text-align: center; margin-top:60px;">
        <button style="width:50%;background-color:green;" name="submit" type="submit">Kirim</button>
        </div>

    </form> 

     <footer>
      &copy; 2024 ATCS Dinas Perhubungan Kab.Blitar, Semua hak cipta dilindungi.
    </footer>
    <script>
      feather.replace();
    </script>
</body>
</html>