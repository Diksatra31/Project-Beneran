<?php
session_start();
include 'koneksi.php';

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
            padding: 15px;
            text-align: center;
            padding-bottom: 25px;
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
            width: 96.5%;
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
            width: 30%; /* Lebar kontainer */
            max-width: 30%;
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
        <a href="dsbr-dokfinal.php">Dokumen Final</a>
        <a href="dsbr-admin.php" style="background-color:gray;">Daftar Admin</a>
        <a href="login.php" class="link-hover" style="margin-top: 150px; text-align:center;"><div style="margin-bottom: 10px;">Log Out</div><i style="margin-left: 10px;" data-feather="log-out"></i></a>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Daftar Admin</h1>
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
                        <th>Nama</th>
                        <th>Akun Dibuat</th>
                    </tr>
                </thead>
                <tbody id="list">
                <?php if ($result->num_rows > 0): ?>
                    <?php $no = 1; ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no++; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo date('d-m-Y H:i:s', strtotime($row['created_at'])); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Tidak ada data pengguna.</td>
                </tr>
            <?php endif; ?>
        </tbody>
                </tbody>
            </table>
        </div>
        <div class="footer">
            &copy; 2024 ATCS Dinas Perhubungan Kab.Blitar. Hak Cipta Dilindungi.
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
