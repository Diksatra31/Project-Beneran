<?php session_start(); include 'koneksi.php';

if (isset($_POST['logout'])) {
    // Hapus semua sesi
    session_unset();
    session_destroy();
    // Redirect ke halaman login
    header("Location: login.php");
    exit();
}

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Ambil data pengguna dari database
$query = "SELECT id, email, name, created_at FROM registrasi";
$result = $conn->query($query);

// Ambil data siswa
$query = "SELECT * FROM dokfinal";
$result = $conn->query($query);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data
    $query = "DELETE FROM dokfinal WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        echo "Data berhasil dihapus!";
        header("Location: dsbr-dokfinal.php"); // Redirect kembali ke halaman tabel
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    //echo "ID tidak ditemukan!";
}

// Menutup koneksi
$conn->close();

// Array nama hari dan bulan
$days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
$months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli", "Agustus", "September", "Oktober", "November", "Desember"];

// Mendapatkan informasi tanggal
$today = new DateTime();
$dayName = $days[$today->format('w')]; // Nama hari (0 untuk Minggu)
$date = $today->format('j'); // Tanggal tanpa nol di depan
$month = $months[$today->format('n') - 1]; // Nama bulan
$year = $today->format('Y'); // Tahun
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Poppins, sans-serif;
            display: flex;
            height: 100vh;
            overflow-y: auto; /* Tambahkan scroll jika konten sidebar terlalu panjang */
        }

        /* Sidebar */
        .sidebar {
            width: 250px; /* Lebar tetap */
            background-color: #0095FF;
            color: white;
            position: fixed; /* Tetap di sisi kiri layar */
            height: 100vh; /* Tinggi sidebar setara layar */
            overflow-y: auto; /* Gulir jika konten sidebar terlalu panjang */
            padding: 20px 0;
        }

        .sidebar h2 {
            margin-bottom: 20px;
            background-size:50px 50px;
            background-color:#FDD100;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            margin: 5px 0;
            display: block;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        /* Header */
        .header {
            background-color:#0095FF;
            color: white;
            padding: 20px;
            width: 200%;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px; /* Beri ruang untuk sidebar */
            width: calc(100% - 250px); /* Lebar konten utama menghindari sidebar */
            background-color: #ecf0f1;
            min-height: 100vh; /* Set tinggi minimum agar responsif */
            overflow-y: auto; /* Aktifkan scroll jika konten utama panjang */
        }

        .content {
            padding: 20px;
            background-color: #ecf0f1;
            flex: 1;
            width: 200%;
        }

        /* Table */
        .content table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .content table th,
        .content table td {
            border: 1px solid #bdc3c7;
            padding: 10px;
            text-align: left;
        }

        .content table th {
            background-color: #34495e;
            color: white;
        }

        .content table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #bdc3c7;
            font-size: 0.9em;
            width: 200%;
            height: 3px;
            padding-top: 5px;
        }

        #list li {
            margin: 5px 0;
        }
        .hidden {
            display: none;
        }

        /* TANGGAL */
        .date-container {
            display: flex;
            justify-content: space-between; /* Jarak penuh antar elemen */
            align-items: center; /* Vertikal tengah */
            width: 14.5%; /* Lebar kontainer */
            max-width: 17%;
            padding: 10px 20px;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan halus */
            border-radius: 8px; /* Sudut membulat */
            margin-top: -50px;
        }
        .date-container .day {
            font-size: 1.8rem;
            font-weight: bold;
            color:black;
        }
        .date-container .full-date {
            font-size: 1.8rem;
            color: #666; /* Warna teks abu-abu gelap */
        }
    </style>
</head>
<body>
    <div class="sidebar">
    <h2 style="padding:50px;margin-top:-20px;"><img src="img/logospan.png" style="width:50%;border-radius:10px;margin-left:-10px;"><img src="img/logo-blitar.png" style="width:50%;margin-left:10px;"></h2>
        <a href="dsbr-regdokumen.php">Registrasi Dan Dokumen</a>
        <a href="dsbr-verpembahasan.php">Verifikasi Dan Pembahasan</a>
        <a href="dsbr-asistensi.php">Asistensi</a>
        <a href="dsbr-dokfinal.php"style="background-color:gray;">Dokumen Final</a>
        <a href="dsbr-admin.php">Daftar Admin</a>
        <a href="login.php" class="link-hover" style="margin-top: 150px; text-align:center;"><div style="margin-bottom: 10px;">Log Out</div><i style="margin-left: 10px;" data-feather="log-out"></i></a>
    </div>

    <div class="main-content">
        <div class="header">
        <h1>Dokumen Final</h1>          
        </div>
        <div class="content">
            <div class="date-container">
                <div class="day"><?php echo $dayName; ?>,</div>
                <div class="full-date"><?php echo "$date $month $year"; ?></div>
            </div>
            <h2>Data Pengguna</h2>
            <div style="border-radius: 10px;margin-left:250px;margin-top:-50px;"><input style="border-radius: 10px;width:347px;height:30px;border-color:#34495e;" type="text" id="searchInput" placeholder="Cari..."></div>
            <div style="margin-left:570px;margin-top:-30px;"><i data-feather="search"></i></div>
            <table>
                <thead>
                    <tr>
                        <th style="text-align:center;">No</th>
                        <th>Email</th>
                        <th>Nama Pengembang/Pembangunan</th>
                        <th>No Whatsapp</th>
                        <th>Bangkitan</th>
                        <th>Dokumen Perbaikan Fix</th>
                        <th>Diupload</th>
                        <th>Download</th>
                        <th>Hapus</th>

                    </tr>
                </thead>
                <tbody id="list">
                <?php if ($result->num_rows > 0): ?>
                    <?php $no = 1; ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no++; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['pengembang']; ?></td>
                            <td><?php echo $row['no_wa']; ?></td>
                            <td><?php echo $row['bangkitan']; ?></td>
                            <td>
                            <?php if (!empty($row['file_bangkitan'])): ?><span><?php echo $row['file_bangkitan']; ?></span><?php else: ?><span>Tidak ada file</span><?php endif; ?>
                            </td>
                            <td><?php echo date('d-m-Y H:i:s', strtotime($row['created_at']));?></td>
                            <td><a href="uploads/<?php echo $row['file_bangkitan']; ?>" download>Download</a></td>
                            <td><a href="?id=<?php echo $row['id']; ?>" style="color: red;" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Tidak ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            </table>
        </div>
        <div class="footer">
           <div style="padding-top:0px;">&copy; 2024 ATCS Dinas Perhubungan Kab.Blitar. Hak Cipta Dilindungi.</div> 
        </div>
    </div>
    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchQuery = this.value.toLowerCase();
            const listItems = document.querySelectorAll('#list tr');

            listItems.forEach(item => {
                const itemText = item.textContent.toLowerCase();
                if (itemText.includes(searchQuery)) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
        
        feather.replace();
    </script>
</body>
</html>
