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
            text-align: center;
            width: 200%;
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
    </style>
</head>
<body>
    <div class="sidebar">
    <h2 style="padding:50px;margin-top:-20px;"><img src="img/logospan.png" style="width:50%;border-radius:10px;margin-left:-10px;"><img src="img/logo-blitar.png" style="width:50%;margin-left:10px;"></h2>
        <a href="dashboard.php" style="background-color:gray;">Data Dashboard</a>
        <a href="dsbr-regdokumen.php">Registrasi Dan Dokumen</a>
        <a href="dsbr-verpembahasan.php">Verifikasi Dan Pembahasan</a>
        <a href="dsbr-asistensi.php">Asistensi</a>
        <a href="dsbr-dokfinal.php">Dokumen Final</a>
        <a href="dsbr-admin.php">Daftar Admin</a>
        <a href="login.php" class="link-hover" style="margin-top: 150px; text-align:center;"><div style="margin-bottom: 10px;">Log Out</div><i style="margin-left: 10px;" data-feather="log-out"></i></a>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Dokumen Final</h1>
        </div>
        <div class="content">
            <h2>Data Pengguna</h2>
        </div>
        <div class="footer">
           <div style="padding-top:0px;">&copy; 2024 ATCS Dinas Perhubungan Kab.Blitar. Hak Cipta Dilindungi.</div> 
        </div>
    </div>
    <script>
        feather.replace();
    </script>
</body>
</html>
