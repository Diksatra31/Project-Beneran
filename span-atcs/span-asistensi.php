<?php include 'koneksi.php';

if (isset($_POST['submit'])) {
    $email =  mysqli_real_escape_string($conn, $_POST['email']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $konsultan = mysqli_real_escape_string($conn, $_POST['konsultan']);
    $catatan = mysqli_real_escape_string($conn, $_POST['catatan']);
    $bangkitan = mysqli_real_escape_string($conn, $_POST['bangkitan']);
   
    // Validasi nilai bangkitan
    $valid_bangkitan = ['rendah', 'sedang', 'tinggi'];
    if (!in_array($bangkitan, $valid_bangkitan)) {
        die("Nilai bangkitan tidak valid.");
    }

    // Direktori untuk menyimpan file 
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);  // Membuat folder jika belum ada
    }
    
    // Proses upload file
    if (isset($_FILES['file_bangkitan']) && $_FILES['file_bangkitan']['error'] == 0) {
        $file_tmp = $_FILES['file_bangkitan']['tmp_name'];
        $file_name = $_FILES['file_bangkitan']['name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_size = $_FILES['file_bangkitan']['size'];

        // Validasi file PDF
        if (strtolower($file_ext) != 'pdf') {
            die("Hanya file PDF yang diperbolehkan.");
        }

        // Membuat nama file yang unik untuk menghindari konflik
        $new_file_name = uniqid() . '.' . $file_ext;
        $file_path = $uploadDir . $new_file_name;

        // Pindahkan file ke direktori tujuan
        if (move_uploaded_file($file_tmp, $file_path)) {
            // Simpan nama file ke database
            $query = "INSERT INTO asistensi (email, judul_permohonan, konsultan, catatan_penilai, bangkitan, file_bangkitan, file_name, created_at) 
                      VALUES ('$email', '$judul', '$konsultan', '$catatan', '$bangkitan', '$new_file_name', '$file_name', NOW())";
                      if (mysqli_query($conn, $query)) {
                        echo "<script>alert('File berhasil dikirim!'); window.location.href = 'span-asistensi.php';</script>";
                        exit();}

            if ($conn->query($query) === TRUE) {
                //echo "Data berhasil disimpan dan file berhasil diunggah!";
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
            }
        } else {
            die("Gagal mengunggah file.");
        }
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

    input, textarea, button, select {
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

    <title>Asistensi</title>
</head>
<body>
    <div class="navbar">  
    <div class="logo" ><img src="img/logospan.png"></div>
    <div style="margin-top:15px;margin-left:90px;">
        <a href="span-regdokumen.php" class="text-container"  href="">Registrasi Dan Dokumen</a>
        <a href="span-verpembahasan.php" class="text-container"  href="">Verifikasi Dan Pembahasan</a> 
        <a href="span-asistensi.php" class="text-container" style="color: #2980b9;" href="">Asistensi</a>
        <a href="span-dokfinal.php" class="text-container"  href="">Dokumen Final</a>  
    </div>   
       <a href="index.php" style="margin-left:110px;color:green;"><i data-feather="home"></i></a>
    </div> 
   
    <h1 style="text-align:center; margin-top: 50px;">Asistensi</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Masukkan email Anda">

        <label for="name">Judul Permohonan:</label>
        <input type="text" id="judul" name="judul" placeholder="Masukkan nama Anda">

        
        <label for="email">Konsultan:</label>
        <input type="text" id="konsultan" name="konsultan" placeholder="Masukkan email Anda">
        
        <label for="email">Catatan Yang Diberikan Oleh Tim Penilai:</label>
        <input type="text" id="catatan" name="catatan" placeholder="Masukkan email Anda">
        
        <label for="bangkitan">Bangkitan:</label>
        <select id="bangkitan" name="bangkitan">
            <option value="" disabled selected>Pilih</option>
            <option name="rendah" value="rendah">Rendah</option>
            <option name="sedang" value="sedang">Sedang</option>
            <option name="tinggi" value="tinggi">Tinggi</option>
        </select>

        <label for="bangkitan"  style="display: block; margin-bottom: 8px; font-weight: bold;">Input File Bangkitan:</label>
        <input type="file" style="background-color:#fff;" id="file_bangkitan" name="file_bangkitan" accept=".pdf" required>
        
    <div style="text-align: center; margin-top:50px;">
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