<?php include 'koneksi.php';

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nama_perseroan = mysqli_real_escape_string($conn, $_POST['nama_perseroan']);
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
    $nama_pimpinan = mysqli_real_escape_string($conn, $_POST['nama_pimpinan']);
    $jabatan = mysqli_real_escape_string($conn, $_POST['jabatan']);
    $nama_konsultan = mysqli_real_escape_string($conn, $_POST['nama_konsultan']);
    $nama_proyek = mysqli_real_escape_string($conn, $_POST['nama_proyek']);
    $kapasitas = mysqli_real_escape_string($conn, $_POST['kapasitas']);
    $no_surat_pemohon = mysqli_real_escape_string($conn, $_POST['no_surat_pemohon']);
    $pembangunan = mysqli_real_escape_string($conn, $_POST['pembangunan']);
    $alamat_proyek = mysqli_real_escape_string($conn, $_POST['alamat_proyek']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $bangkitan = mysqli_real_escape_string($conn, $_POST['bangkitan']);

    if (!isset($_FILES['pdf_files'])) {
        die("Tidak ada file yang diunggah.");
    }

    // Direktori untuk menyimpan file ZIP
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);  // Membuat folder jika belum ada
    }

    // Membuat nama file ZIP yang unik
    $zipFileName = 'pdf_upload_' . time() . '.zip';
    $zip = new ZipArchive();

    // Membuka file ZIP untuk ditulis
    if ($zip->open($uploadDir . $zipFileName, ZipArchive::CREATE) === TRUE) {

        // Buat folder di dalam ZIP untuk file PDF
        $folderName = 'pdf_files/';

        // Mengambil semua file PDF yang diunggah
        $fileNames = $_FILES['pdf_files']['name'];
        $fileTmpNames = $_FILES['pdf_files']['tmp_name'];

        // Proses setiap file PDF yang diunggah
        foreach ($fileTmpNames as $index => $tmpName) {
            if ($_FILES['pdf_files']['error'][$index] == UPLOAD_ERR_OK) {
                // Tambahkan file PDF ke dalam folder di ZIP
                $zip->addFile($tmpName, $folderName . $fileNames[$index]);
            }
        }

        // Menutup file ZIP setelah semua file dimasukkan
        $zip->close();
    }

    // Validasi nilai pembangunan
    $valid_pembangunan = ['Pembangunan', 'Pengembangan'];
    if (!in_array($pembangunan, $valid_pembangunan)) {
        die("Nilai pembangunan tidak valid.");
    }

    // Validasi nilai bangkitan
    $valid_bangkitan = ['Rendah', 'Sedang', 'Tinggi'];
    if (!in_array($bangkitan, $valid_bangkitan)) {
        die("Nilai bangkitan tidak valid.");
    }

    // Query untuk menyimpan data
    $query = "INSERT INTO regdokumen (email, nama_perseroan, telepon, nama_pimpinan, jabatan, nama_konsultan, kapasitas, no_surat_pemohon, nama_proyek, pembangunan, alamat_proyek, tanggal, bangkitan, file_bangkitan, created_at) 
    VALUES ('$email', '$nama_perseroan', '$telepon', '$nama_pimpinan', '$jabatan', '$nama_konsultan', '$no_surat_pemohon', '$nama_proyek', '$kapasitas', '$pembangunan', '$alamat_proyek', '$tanggal', '$bangkitan', '$zipFileName', NOW())";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('File berhasil dikirim!'); window.location.href = 'span-regdokumen.php';</script>";
        exit();
    
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

        $tanggal_input = '20025-05-31'; // Contoh input
    $tanggal = DateTime::createFromFormat('Y-m-d', $tanggal_input);

    if ($tanggal && $tanggal->format('Y-m-d') === $tanggal_input) {
        $formatted_date = $tanggal->format('Y-m-d');
    } else {
        die('Format tanggal tidak valid!');
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--font google-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!--feather icon-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/feather-icons"></script>
    <!--My Style-->
    <link rel="stylesheet" href="css/style.css" />

    <style>
        form {
            flex-direction: column;
            /* Mengatur elemen form ke bawah */
            margin-left: 15%;
            width: 400px;
            /* Pusatkan form di tengah layar */
            margin-top: 50px;
        }

        select,
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: flex;
        }


        label {
            margin-bottom: 5px;
            font-weight: bold;
            display: flex;
        }

        input,
        textarea,
        button {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: flex;
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            justify-content: center;     
        }


        button:hover {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Navbar Style */
        .navbar {
            display: flex;
            background-color: #FDD100;
            padding: 14px 20px;
            padding-left: 20px;
            justify-content: center;
        }

        .text-container {
            padding-right: 20px;
            /* Jarak kanan */
        }

        .navbar img {
            width: 50px;
            /* Mengubah ukuran logo menjadi 50px lebar */
            height: auto;
            /* Menjaga rasio gambar */
            border-radius: 10%;
            /* Membulatkan gambar menjadi lingkaran */
        }

        .navbar img:hover {
            background-color: antiquewhite;
        }

        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            color: black;
            box-shadow: #333;
        }

        footer {
            background-color: #333;
            /* Warna latar belakang footer */
            color: white;
            /* Warna teks di footer */
            text-align: center;
            /* Teks rata tengah */
            padding: 20px;
            /* Jarak di dalam footer */
            position: relative;
            /* Posisi relatif agar footer tetap di bawah */
            bottom: 0;
            width: 100%;
            /* Footer memanjang sepanjang halaman */
            margin-top: 100px;
            /* Memberi jarak 50px di atas footer */
        }
    </style>

    <title>Registrasi dan Dokumen</title>
</head>

<body>
    <div class="navbar">
        <div class="logo"><img src="img/logospan.png"></div>
        <div style="margin-top:15px;margin-left:90px;">
            <a href="span-regdokumen.php" class="text-container" style="color: #2980b9;" >Registrasi Dan Dokumen</a>
            <a href="span-verpembahasan.php" class="text-container">Verifikasi Dan Pembahasan</a>
            <a href="span-asistensi.php" class="text-container">Asistensi</a>
            <a href="span-dokfinal.php" class="text-container">Dokumen Final</a>
        </div>
        <a href="index.php" style="margin-left:110px;color:green;"><i data-feather="home"></i></a>
    </div>
    <h1 style="text-align:center; margin-top: 50px;">Registrasi Dan Dokumen</h1>

    <!-- form -->
     <div>
        
     </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" required>

            <label for="perseroan">Nama Perseroan/Perusahaan:</label>
            <input type="text" id="perseroan" name="nama_perseroan" placeholder="Masukkan Nama Perseroan">

            <label for="telepon">No.Telepon :</label>
            <input type="tel" id="telepon" name="telepon" placeholder="Masukkan No. Telepon" required>

            <label for="pimpinan">Nama Pimpinan:</label>
            <input type="text" id="pimpinan" name="nama_pimpinan" placeholder="Masukkan Nama Pimpinan" required>

            <label for="jabatan">Jabatan:</label>
            <input type="text" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan">

            <label for="konsultan">Nama Konsultan (Bila ada):</label>
            <input type="text" id="konsultan" name="nama_konsultan" placeholder="Masukkan Nama Konsultan">

            <label for="surat">No. Surat Permohonan:</label>
            <input type="text" id="surat" name="no_surat_pemohon" placeholder="Masukkan No. Surat Permohonan" required>
        </div>
            

       <div style="margin-left:600px;margin-top: -580px;width:100%;">

            <label for="namaproyek">Nama Proyek:</label>
            <input type="text" id="namaproyek" name="nama_proyek" placeholder="Masukkan Nama Proyek" required>

            <label for="kapasitas">Ukuran/Kapasitas:</label>
            <input type="text" id="kapasitas" name="kapasitas" placeholder="Masukkan Ukuran/Kapasitas" required>

            <label for="pembangunan">Jenis Kegiatan (Pembangunan/Pengembangan):</label>
            <select id="pembangunan" name="pembangunan">
                <option value="" disabled selected>Pilih</option>
                <option value="Pembangunan">Pembangunan</option>
                <option value="Pengembangan">Pengembangan</option>
            </select>

            <label for="alamat_proyek">Alamat Kegiatan:</label>
            <input type="text" id="alamat_proyek" name="alamat_proyek" placeholder="Masukkan Alamat Proyek" required>

            <label for="tanggal">Tanggal Surat Permohonan:</label>
            <input type="date" id="tanggal" name="tanggal" required>

            <label for="bangkitan1">Bangkitan:</label>
            <select id="bangkitan" name="bangkitan" required>
                <option value="" disabled selected>Pilih</option>
                <option value="Rendah">Rendah</option>
                <option value="Sedang">Sedang</option>
                <option value="Tinggi">Tinggi</option>
            </select>

            <label for="bangkitan" style="display: block; margin-bottom: 8px; font-weight: bold;">File Upload(Wajib Isi):</label>
            <button id="showFormButtonLow" name="rendah" style="width:100%;background-color: green;">Rendah</button>
            <button id="showFormButtonMid" name="sedang" style="width:100%;background-color: #FDD100;">Sedang</button>
            <button id="showFormButtonHigh" name="tinggi" style="width:100%;background-color: red;">Tinggi</button>
        
       </div>
            

        <!-- INPUT FILE RENDAH -->
        <div id="formLow" style="width: 200%;background-color:whitesmoke;margin-top: 50px;padding: 15px;border: 1px solid #ccc;border-radius: 5px;display: none; margin-left:110px;">
            <h2>File Untuk Bangkitan(Rendah)</h2>
            <div style="color:blue;font-size:large;text-align:center;margin-top:30px;margin-bottom:10px;">PERSYARATAN ADMINISTRATIF PERSETUJUAN ANDALALIN</div>
            <label for="Inputlow1" style="font-size:16px;">Surat Permohonan Persetujuan Andalalin:</label>
            <input type="file" id="Inputlow1" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="Inputlow2" style="font-size:16px;">Surat Bukti Kesesuaian Tata Ruang dan/atau Izin Pemanfaatan Ruang/PKKPR:</label>
            <input type="file" id="Inputlow2" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="Inputlow3" style="font-size:16px;">Foto Kondisi Eksisting lapangan terkini:</label>
            <input type="file" id="Inputlow3" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="Inputlow4" style="font-size:16px;">Surat Bukti Kepemilikan atau Penguasaan Lahan:</label>
            <input type="file" id="Inputlow4" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="Inputlow5" style="font-size:16px;">Gambar Tata letak bangunan, DED bangunan yang diusulkan dan Resume Kegiatan:</label>
            <input type="file" id="Inputlow5" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="Inputlow3" style="font-size:16px;">NIB/TDP :</label>
            <input type="file" id="Inputlow3" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="Inputlow3" style="font-size:16px;">KTP Pimpinan/Pemohon :</label>
            <input type="file" id="Inputlow3" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="Inputlow3" style="font-size:16px;">NPWP Pimpinan/Perusahaan/Pemohon :</label>
            <input type="file" id="Inputlow3" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="Inputlow3" style="font-size:16px;">Dokumen Gambaran Umum Mitigasi Dampak Lalu Lintas :</label>
            <input type="file" id="Inputlow3" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="Inputlow6" style="font-size:16px;">MOU Kerjasama (apabila ada kerja sama dengan pihak lain, semisal perjanjian sewa lahan, perjanjian penggunaan akses dsb):</label>
            <input type="file" id="mou" name="pdf_files[]" accept=".pdf" multiple>
        </div>

        <!-- INPUT FILE SEDANG  -->
        <div id="formMid" style="width: 200%;background-color:whitesmoke;margin-top: 50px;padding: 15px;border: 1px solid #ccc;border-radius: 5px;display: none; margin-left:110px;">
            <h2>File Untuk Bangkitan(Sedang)</h2>
            <div style="color:blue;font-size:large;text-align:center;margin-top:30px;margin-bottom:10px;">PERSYARATAN ADMINISTRATIF PERSETUJUAN ANDALALIN</div>

            <label for="inputmid1">Surat Permohonan Persetujuan Andalalin:</label>
            <input type="file" id="inputmid1" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="inputmid2">Surat Bukti Kesesuaian Tata Ruang dan/atau Izin Pemanfaatan Ruang:</label>
            <input type="file" id="inputmid2" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="inputmid3">Foto Kondisi Eksisting lapangan terkini:</label>
            <input type="file" id="inputmid3" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="inputmid4">Surat Bukti Kepemilikan atau Penguasaan Lahan:</label>
            <input type="file" id="inputmid4" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="inputmid5">Gambar Tata letak bangunan, DED bangunan yang diusulkan dan Resume Kegiatan:</label>
            <input type="file" id="inputmid5" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="inputmid6">MOU Kerjasama (apabila ada kerja sama dengan pihak lain, semisal perjanjian sewa lahan, perjanjian penggunaan akses dsb):</label>
            <input type="file" id="mou" name="pdf_files[]" accept=".pdf" multiple>

            <div style="color:blue;font-size:large;text-align:center;margin-top:30px;margin-bottom:10px;">PERSYARATAN TEKNIS PERSETUJUAN ANDALALIN</div>
            <label for="inputmid7">COVER , KATA PENGANTAR, DAFTAR ISI, DAFTAR TABEL DAFTAR GAMBAR dan DAFTAR LAMPIRAN:</label>
            <input type="file" id="inputmid7" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="inputmid8">BAB 1 - PENDAHULUAN:</label>
            <input type="file" id="inputmid8" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="inputmid9"> BAB 2 - ANALISIS KONDISI DAN KINERJA LALU LINTAS:</label>
            <input type="file" id="inputmid9" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="inputmid10">BAB 3 - SIMULASI KINERJA LALU LINTAS:</label>
            <input type="file" id="inputmid10" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="inputmid11">BAB 4 - REKOMENDASI PENANGANAN DAMPAK LALU LINTAS:</label>
            <input type="file" id="inputmid11" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="inputmid12">BAB 5 - PENUTUP:</label>
            <input type="file" id="inputmid12" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="inputmid13">LAMPIRAN I: GAMBAR GAMBAR TEKNIS (WAJIB A3):</label>
            <input type="file" id="inputmid13" name="pdf_filesd[]" accept=".pdf" multiple required>
            <label for="inputmid14">LAMPIRAN II: PERIZINAN YANG TELAH DIMILIKI (ASPEK LEGALITAS):</label>
            <input type="file" id="inputmid14" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="inputmid15">LAMPIRAN III: (SERTIFIKAT DAN SK KOMPETENSI PENYUSUN ANDALALIN):</label>
            <input type="file" id="inputmid15" name="pdf_files[]" accept=".pdf" multiple required>
        </div>

        <!-- INPUT FILE TINGGI -->
        <div id="formHigh" style="width: 200%;background-color:whitesmoke;margin-top: 50px;padding: 15px;border: 1px solid #ccc;border-radius: 5px;display: none; margin-left:110px;">
            <h2>File Untuk Bangkitan (Tinggi)</h2>
            <div style="color:blue;font-size:large;text-align:center;margin-top:30px;margin-bottom:10px;">PERSYARATAN ADMINISTRATIF PERSETUJUAN ANDALALIN</div>
            <label for="fileInputHigh"> Surat Permohonan Persetujuan Andalalin:</label>
            <input type="file" id="fileInputHigh" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="fileInputHigh">Surat Bukti Kesesuaian Tata Ruang dan/atau Izin Pemanfaatan Ruang:</label>
            <input type="file" id="fileInputHigh" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="fileInputHigh">Foto Kondisi Eksisting lapangan terkini:</label>
            <input type="file" id="fileInputHigh" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="fileInputHigh">Surat Bukti Kepemilikan atau Penguasaan Lahan:</label>
            <input type="file" id="fileInputHigh" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="fileInputHigh">Gambar Tata letak bangunan, DED bangunan yang diusulkan dan Resume Kegiatan:</label>
            <input type="file" id="fileInputHigh" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="fileInputHigh">MOU Kerjasama (apabila ada kerja sama dengan pihak lain, semisal perjanjian sewa lahan, perjanjian penggunaan akses dsb):</label>
            <input type="file" id="mou" name="pdf_files[]" accept=".pdf" multiple>
            <div style="color:blue;font-size:large;text-align:center;margin-top:30px;margin-bottom:10px;">PERSYARATAN TEKNIS PERSETUJUAN ANDALALIN</div>
            <label for="fileInputHigh">COVER , KATA PENGANTAR, DAFTAR ISI, DAFTAR TABEL DAFTAR GAMBAR dan DAFTAR LAMPIRAN:</label>
            <input type="file" id="fileInputHigh" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="fileInputHigh">BAB 1 - PENDAHULUAN:</label>
            <input type="file" id="fileInputHigh" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="fileInputHigh">BAB 2 - PERENCANAAN DAN METODOLOGI ANDALALIN:</label>
            <input type="file" id="fileInputHigh" name="pdf_files[]" accept=".pdf" multiplerequired>
            <label for="fileInputHigh">BAB 3 - ANALISIS KONDISI DAN KINERJA LALU LINTAS:</label>
            <input type="file" id="fileInputHigh" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="fileInputHigh">BAB 4 - SIMULASI KINERJA LALU LINTAS:</label>
            <input type="file" id="fileInputHigh" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="fileInputHigh">BAB 5 - REKOMENDASI PENANGANAN DAMPAK LALU LINTAS:</label>
            <input type="file" id="fileInputHigh" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="fileInputHigh">BAB 6 - PENUTUP:</label>
            <input type="file" id="fileInputHigh" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="fileInputHigh">LAMPIRAN I: GAMBAR GAMBAR TEKNIS (WAJIB A3):</label>
            <input type="file" id="fileInputHigh" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="fileInputHigh">LAMPIRAN II: PERIZINAN YANG TELAH DIMILIKI (ASPEK LEGALITAS):</label>
            <input type="file" id="fileInputHigh" name="pdf_files[]" accept=".pdf" multiple required>
            <label for="fileInputHigh">LAMPIRAN III: (SERTIFIKAT DAN SK KOMPETENSI PENYUSUN ANDALALIN):</label>
            <input type="file" id="fileInputHigh" name="pdf_files[]" accept=".pdf" multiple required>
        </div>

        <div>
            <button style="margin-left:400px;margin-top:70px;width:50%;background-color:green;" name="submit" type="submit">Kirim</button>
        </div>
    </form>

    <script>
                function toggleForm(formId) {
            const forms = ['formLow', 'formMid', 'formHigh'];
            forms.forEach(id => {
                const form = document.getElementById(id);
                const inputs = form.querySelectorAll('input[type="file"]');
                if (id === formId) {
                    form.style.display = 'block'; // Tampilkan form yang dipilih
                    // Set required untuk semua input kecuali MOU
                    inputs.forEach(input => {
                        if (input.id.includes('mou') || input.id.includes('mou')) {
                            input.removeAttribute('required');
                        } else {
                            input.setAttribute('required', true);
                        }
                    });
                    const firstInput = form.querySelector('input[type="file"]');
                    if (firstInput) firstInput.focus(); // Berikan fokus ke input pertama
                } else {
                    form.style.display = 'none'; // Sembunyikan form lain
                    // Hapus semua atribut required
                    inputs.forEach(input => {
                        input.removeAttribute('required');
                    });
                }
            });
        }

        document.getElementById('showFormButtonLow').addEventListener('click', function() {
            console.log('Low form clicked');
            toggleForm('formLow');
        });

        document.getElementById('showFormButtonMid').addEventListener('click', function() {
            console.log('Mid form clicked');
            toggleForm('formMid');
        });

        document.getElementById('showFormButtonHigh').addEventListener('click', function() {
            console.log('High form clicked');
            toggleForm('formHigh');
        });

        feather.replace();
    </script>
 <footer>
      &copy; 2024 ATCS Dinas Perhubungan Kab.Blitar, Semua hak cipta dilindungi.
    </footer>
</body>

</html>