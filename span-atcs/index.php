<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!---font google-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!--feather icon-->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <script src="https://unpkg.com/feather-icons"></script>
    <!--My Style-->
    <link rel="stylesheet" href="css/style.css" />

    <!--style-->
    <style>
      p {
        width: 60%; /* Menentukan lebar artikel */
        position: relative; /* Menempatkan artikel secara absolut */
        top: 80%; /* Menempatkan artikel di tengah secara vertikal */
        left: 20%; /* Menempatkan artikel di tengah secara horizontal */
        padding: 20px;
        border-radius: 8%;
        margin-top: -70px;
        text-align: center;
      }

      button,a {
        text-align: center;
        background-color: #fdd100;
        color: rgb(255, 255, 255);
        border: darkturquoise;
        cursor: pointer;

      }

      button,a:hover {
        background-color: #2980b9;
      }

      form {
        display: flex;
        flex-direction: column; /* Mengatur elemen form ke bawah */
        max-width: 400px; /* Batasi lebar form */
        margin: 0 auto; /* Pusatkan form di tengah layar */
        padding-top: 100px; /* Geser form ke bawah */
        background-color: #254BE5;
        padding: 50px;
        border-radius: 10px;
        margin-top: 50px;
      }

      label {
        margin-bottom: 5px;
        font-weight: bold;
      }

      input,
      textarea,
      button,a {
        margin-bottom: 15px;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
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
        margin-top: -15px; /* Memberi jarak 50px di atas footer */
      }

      table {
        border-collapse: collapse;
        width: 85%; 
        margin-top: 50px;
        margin-left: 100px;
        background-color: #fff;
        font-size: 13px;
      }

      th,
      td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
      }

      th {
        background-color: yellow;
      }

      #table-container {
            display: none;
            margin-bottom: 20px; /* Agar tabel muncul di atas tombol */
        }
    </style>

    <title>Sistem Pengajuan Andalalin</title>
  </head>
  <body>
    <div class="slider">
      <figure>
        <div class="slide">
          <img src="img/atcs1.png"/>
        </div>
        <div class="slide">
          <img src="img/atcs2.png"/>
        </div>
        <div class="slide">
          <img src="img/dishub2.png"/>
        </div>
        <div class="slide">
          <img src="img/dishub1.png"/>
        </div>
      </figure>
    </div>

    <div class="container">
      <img style="position:relative;margin-top: -80px;" src="img/logospan.png"/>
    </div>

    <p style="color: #fff">
      SPAN (Sistem Pengajuan Andalalin) adalah sistem pelayanan yang digunakan
      untuk membantu proses perizinan persetujuan Analisis Dampak Lalu Lintas
      (ANDALALIN) di lingkungan Kementerian Perhubungan.
    </p>

      <form>
        <div style="margin-bottom:30px;text-align:center;color:white;font-size:20px;">SPAN</div>
        <a href="span-regdokumen.php" type="submit">Registrasi dan Dokumen</a>
        <a href="span-verpembahasan.php" type="submit">Verifikasi dan Pembahasan</a>
        <a href="span-asistensi.php" type="submit">Asistensi</a>
        <a href="span-dokfinal.php" type="submit">Dokumen Final</a>
      </form>

      <!--TABLE-->
   <div>
  
    <div style="text-align:center;margin-top:80px;color:white;font-size:25px;">Kriteria Ukuran Wajib Analisis Dampak Lalu Lintas</div>

  <table>

<tr>
  <th>No.</th>
  <th>Jenis Rencana Pembangunan</th>
  <th>Ukuran Minimal</th>
  <th>Kategori Bangkitan Lalu Lintas</th>
</tr>

<tr>
  <td rowspan="15"><b style="font-size: large;">1.</b></td>
  <td colspan="4"><b>Pusat Kegiatan</b></td>
</tr>

<tr>
  <td>A. Kegiatan perdagangan dan perbelanjaan</td>
  <td>Di atas 3000 m² luas lantai bangunan<br>1001 m² s.d. 3000 m² luas lantai bangunan<br>500 m² s.d. 1000 m² luas lantai bangunan</td>
  <td>Bangkitan Tinggi<br>Bangkitan Sedang<br>Bangkitan Rendah</td>
</tr>

<tr>
  <td>B. Kegiatan perkantoran</td>
  <td>Di atas 10.000 m² luas lantai bangunan<br>4.001 m² s.d. 10.000 m² luas lantai bangunan<br>1.000 m² s.d. 4000 m² luas lantai bangunan</td>
  <td>Bangkitan Tinggi<br>Bangkitan Sedang<br>Bangkitan Rendah</td>
</tr>

<tr>
  <td colspan="4">C. Kegiatan Industri dan Pergudangan</td>

</tr>

<tr>
  <td>1) Industri</td>
  <td>Di atas 10.000 m² luas lantai bangunan<br>5001 m² s.d. 10.000 m² luas lantai bangunan<br>2500 m² s.d. 5000 m² luas lantai bangunan</td>
  <td>Bangkitan Tinggi<br>Bangkitan Sedang <br>Bangkitan Rendah </td>
</tr>

<tr>
  <td>2) Pergudangan</td>
  <td>Di atas 500.000 m² luas lantai bangunan<br>170.001 m² s.d. 500.000 m² luas lantai bangunan<br>40.000 m² s.d. 170.000 m² luas lantai bangunan</td>
  <td>Bangkitan Tinggi <br>Bangkitan Sedang<br>Bangkitan Rendah</td>
</tr>

<tr>
  <td colspan="4">D. Kegiatan Pariwisata</td>

</tr>

<tr>
  <td>1) Kawasan Pariwisata</td>
  <td>Wajib</td>
  <td>Bangkitan Tinggi </td>
</tr>

<tr>
  <td>2) Tempat Wisata</td>
  <td>Di atas 10,0 hektar luas lahan<br>5,0 s.d. 10,0 hektar luas lahan<br>1,0 s.d. 5,0 hektar luas lahan</td>
  <td>Bangkitan Tinggi <br>Bangkitan Sedang <br>Bangkitan Rendah </td>
</tr>

<tr>
  <td colspan="4">E. Fasilitas Pendidikan</td>
</tr>

<tr>
  <td rowspan="2">Sekolah/Universitas</td>

</tr>

<tr>
  <td>Di atas 1500 siswa <br> 500 s.d. 1500 siswa</td>
  <td>Bangkitan Tinggi  <br> Bangkitan Sedang</td>
</tr>

<tr>
  <td colspan="4">F. Fasilitas Pelayanan Umum</td>
</tr>

<tr>
  <td>1) Rumah Sakit</td>
  <td>Di atas 700 tempat tidur <br>201 s.d. 700 tempat tidur <br>75 s.d. 200 tempat tidur</td>
  <td>Bangkitan Tinggi<br>Bangkitan Sedang<br>Bangkitan Rendah</td>
</tr>

<tr>
  <td>2) Bank</td>
  <td>Di atas 3000 m² luas Iantai bangunan <br>1001 m² s.d. 3000 m² luas Iantai bangunan <br>500 m² s.d. 1000 m² luas Iantai bangunan</td>
  <td>Bangkitan Tinggi <br>Bangkitan Sedang<br>Bangkitan Rendah</td>
</tr>

<tr>
  <td rowspan="7"><b style="font-size: large;">2.</b></td>
  <td colspan="4"><b>Perumahan dan Permukiman</b></td>
</tr>

<tr>
  <td colspan="4">A. Perumahan dan Pemukiman</td>
</tr>

<tr>
  <td>1) Perumahan Sederhana</td>
  <td>Di atas 1000 unit <br>401 s.d. 1000 unit <br>150 s.d. 400 unit</td>
  <td>Bangkitan Tinggi <br>Bangkitan Sedang<br>Bangkitan Rendah</td>
</tr>

<tr>
  <td>2) Perumahan menengah-atas/Townhouse/Cluster</td>
  <td>Di atas 500 unit<br>301 s.d. 500 unit<br>100 s.d. 300 Unit</td>
  <td>Bangkitan Tinggi <br>Bangkitan Sedang <br>Bangkitan Rendah</td>
</tr>

<tr>
  <td colspan="4">B. Rumah Susun Dan Apartemen</td>
</tr>

<tr>
  <td>1) Rumah Susun Sederhana</td>
  <td>Di atas 800 unit<br>150 s.d. 800 unit</td>
  <td>Bangkitan Sedang<br>Bangkitan Rendah</td>
</tr>

<tr>
  <td>2) Apartement</td>
  <td>Di atas 500 unit <br>301 s.d. 500 Unit <br> 50 s.d. 300 Unit</td>
  <td>Bangkitan Tinggi <br>Bangkitan Sedang<br>Bangkitan Rendah</td>
</tr>

<tr>
  <td rowspan="26"><b style="font-size: large;">3.</b></td>
  <td colspan="4"><b>Infrastruktur</b></td>
</tr>

<tr>
  <td>A. Akses ke dan dari jalantol</td>
  <td>Wajib</td>
  <td>Bangkitan Tinggi</td>
</tr>

<tr>
  <td colspan="4">B. Pelabuhan</td>
</tr>

<tr>
  <td>1) Pelabuhan Utama</td>
  <td>Wajib (melayani kegiatan angkutan <br>laut dalam negeri dan internasional)</td>
  <td>Bangkitan Tinggi</td>
</tr>

<tr>
  <td>2) Pelabuhan Pengumpul</td>
  <td>Wajib (melayani kegiatan angkutan laut <br>dalam negeri dengan jangkauan pelayanan antarprovinsi)</td>
  <td>Bangkitan Tinggi </td>
</tr>

<tr>
  <td>3) Pelabuhan Pengumpan Regional</td>
  <td>Wajib (melayani kegiatan angkutan laut dalam <br>negeri dengan jangkauan pelayanan dalam provinsi)</td>
  <td>Bangkitan Sedang</td>
</tr>

<tr>
  <td>4) Pelabuhan Pengumpan Lokal</td>
  <td>Wajib (melayani kegiatan angkutan laut dalam<br> negeri dengan jangkauan pelayanan dalam kabupaten/kota)</td>
  <td>Bangkitan Sedang</td>
</tr>

<tr>
  <td>5) Pelabuhan Khusus</td>
  <td>Luas Lahan di atas 100.000 m² <br> Luas lahan 50.001 m² s.d. 100.000 m² <br>Luas Lahan di bawah 50.000 m²</td>
  <td>Bangkitan Tinggi <br>Bangkitan Sedang<br>Bangkitan Rendah</td>
</tr>

<tr>
  <td>6) Pelabuhan Sungai,Danau dan Penyeberangan</td>
  <td>Penyeberangan Lintas Propinsi dan/atau antarnegara <br>Penyeberangan Lintas Kabupaten/Kota <br>Penyeberangan Lintas dalam Kabupaten/Kota</td>
  <td>Bangkitan Tinggi <br>Bangkitan Sedang<br>Bangkitan Rendah</td>
</tr>

<tr>
  <td colspan="4">C. Bandar Udara</td>
</tr>

<tr>
  <td>1) Bandar Udara Pengumpul Skala Pelayanan Primer</td>
  <td>Wajib ≥ 5 juta orang pertahun</td>
  <td>Bangkitan Tinggi</td>
</tr>

<tr>
  <td>2) Bandar Udara Pengumpul Skala Pelayanan Sekunder</td>
  <td>Wajib ≥ 1 juta orang s.d. ≤ 5 juta orang pertahun</td>
  <td>Bangkitan Tinggi</td>
</tr>

<tr>
  <td>3) Bandar Udara Pengumpul Skala Pelayanan Tersier</td>
  <td>Wajib ≥ 500 ribu orang s.d. ≤ 1 juta orang pertahun Wajib</td>
  <td>Bangkitan Sedang</td>
</tr>

<tr>
  <td>4) Bandar Udara Pengumpan (Spoke)</td>
  <td>Wajib</td>
  <td>Bangkitan Rendah</td>
</tr>

<tr>
  <td colspan="4">D. Terminal</td>
</tr>

<tr>
  <td>1) Terminal Penumpang Tipe A</td>
  <td>Wajib ((melayani hingga kendaraan <br> penumpang umum untuk angkutan antar kota antar propinsi(AKAP), <br> dan angkutan lintas batas antar negara))</td>
  <td>Bangkitan Tinggi </td>
</tr>

<tr>
  <td>2) Terminal Penumpang Tipe B</td>
  <td>Wajib (melayani hingga kendaraan penumpang <br> umum untuk angkutan antar kota dalam <br>propinasi (AKDP) dan angkutan kota (AK))</td>
  <td>Bangkitan Sedang</td>
</tr>

<tr>
  <td>3) Terminal Penumpang Tipe C</td>
  <td>Wajib (melayani kendaraan penumpang <br>umum untuk angkutan pedesaan (ADES))</td>
  <td>Bangkitan Rendah</td>
</tr>

<tr>
  <td>4) Terminal Angkutan Barang</td>
  <td>Wajib</td>
  <td>Bangkitan Tinggi</td>
</tr>

<tr>
  <td>5) Terminal Peti Kemas</td>
  <td>Wajib</td>
  <td>Bangkitan Tinggi</td>
</tr>

<tr>
  <td colspan="4">E. Stasiun Kereta</td>
</tr>

<tr>
  <td>1) Stasiun Kereta Api Kelas Besar</td>
  <td>Wajib</td>
  <td>Bangkitan Tinggi</td>
</tr>

<tr>
  <td>2) Stasiun Kereta Api Kelas Sedang</td>
  <td>Wajib</td>
  <td>Bangkitan Sedang</td>
</tr>

<tr>
  <td>3) Stasiun Kereta Api Kelas Kecil</td>
  <td>Wajib</td>
  <td>Bangkitan Rendah</td>
</tr>

<tr>
  <td>F. Pool Kendaraan</td>
  <td>Wajib</td>
  <td>Bangkitan Sedang</td>
</tr>

<tr>
  <td>G. Fasilitas Parkir untuk Umum</td>
  <td> Di atas 300 SRP <br>100 s.d. 300 SRP</td>
  <td>Bangkitan Tinggi <br>Bangkitan Sedang</td>
</tr>

<tr>
  <td rowspan="20"><b style="font-size: large;">4.</b></td>
  <td colspan="4"><b>Pusat Kegiatan/ Pemukiman / Infrastruktur lainnya:</b></td>
</tr>

<tr>
  <td>A. Stasiun Pengisian Bahan Bakar</td>
  <td> Di atas 6 dispenser<br>3 s.d. 6 dispenser <br>1 s.d. 2 dispenser </td>
  <td> Bangkitan Tinggi<br>Bangkitan Sedang <br>Bangkitan Rendah</td>
</tr>

<tr>
  <td>B. Hotel</td>
  <td> Di atas 300 kamar<br> 121 s.d. 300 kamar<br>75 s.d. 120 kamar </td>
  <td>Bangkitan Tinggi<br>Bangkitan Sedang<br> Bangkitan Rendah</td>
</tr>

<tr>
  <td>C. Gedung Pertemuan</td>
  <td>Di atas 3.000 m² luas Iantai bangunan <br>1.000 m² s.d. 3.000 m² luaslantai bangunan </td>
  <td> Bangkitan Tinggi<br> Bangkitan Sedang</td>
</tr>

<tr>
  <td>D. Restaurant</td>
  <td>Diatas 300 tempat duduk <br> 100 s.d. 300 tempat duduk</td>
  <td> Bangkitan Sedang<br>Bangkitan Rendah</td>
</tr>

<tr>
  <td>E. Fasilitas Olahraga (indoor atau outdoor)</td>
  <td>Diatas 20.000 m² luas lantai bangunan <br>5.001 m² s.d. 20.000 m² luas lantai bangunan <br>1.000 m² s.d. 5.000 m² luas lantai bangunan </td>
  <td>Bangkitan Tinggi<br>Bangkitan Sedang<br>Bangkitan Rendah</td>
</tr>

<tr>
  <td>F. Kawasan TOD (Transit Oriented Development)</td>
  <td>Wajib</td>
  <td>Bangkitan Tinggi</td>
</tr>

<tr>
  <td>G. Asrama</td>
  <td> Di atas 700 kamar<br>150 s.d. 700 kamar </td>
  <td> Bangkitan Sedang<br>Bangkitan Rendah</td>
</tr>

<tr>
  <td>H. Ruko</td>
  <td> Di atas 5.000 m² luas lantai bangunan<br>2.000 m² s.d. 5.000 m² luas lantai bangunan </td>
  <td>Bangkitan Sedang<br>Bangkitan Rendah</td>
</tr>

<tr>
  <td>I. Jalan Layang (flyover)</td>
  <td>Wajib</td>
  <td>Bangkitan Tinggi</td>
</tr>

<tr>
  <td>J. Lintas Bawah(underpass)</td>
  <td>Wajib</td>
  <td>Bangkitan Tinggi</td>
</tr>

<tr>
  <td>K. Terowongan (tunnel)</td>
  <td>Wajib</td>
  <td>Bangkitan Tinggi</td>
</tr>

<tr>
  <td>L. Jembatan</td>
  <td>Wajib</td>
  <td>Bangkitan Tinggi</td>
</tr>

<tr>
  <td colspan="4">M. Rest Area</td>
</tr>

<tr>
  <td>1) Rest Area Tipe A</td>
  <td>Wajib</td>
  <td>Bangkitan Tinggi</td>
</tr>

<tr>
  <td>2) Rest Area Tipe B</td>
  <td>Wajib</td>
  <td>Bangkitan Sedang</td>
</tr>

<tr>
  <td>3) Rest Area Tipe C</td>
  <td>Wajib</td>
  <td>Bangkitan Rendah</td>
</tr>

<tr>
  <td>N. Kegiatan yang apabila<br>ternyata diperhitungkan telah menimbulkan 1500<br>perjalanan (kendaraan) baru padajam padat<br>dan/ atau menimbulkan rata-rata diatas 10000 <br>perjalanan (kendaraan) baru setiap harinya pada<br>jalan yang dipengaruhi oleh adanya bangunan<br>atau permukiman atau infrastruktur yang <br>dibangun atau dikembangkan.</td>
  <td>Wajib</td>
  <td>Bangkitan Tinggi</td>
</tr>

<tr>
  <td>O. Kegiatan yang apabila<br>ternyata diperhitungkan telah menimbulkan 500 <br>perjalanan (kendaraan) baru padajam padat<br>dan/ atau menimbulkan rata-rata 3000 - 4000<br>perjalanan (kendaraan) baru setiap harinya pada<br>jalan yang dipengaruhi oleh adanya bangunan<br>atau permukiman atau infrastruktur yang<br>dibangun atau dikembangkan.</td>
  <td>Wajib</td>
  <td>Bangkitan Sedang</td>
</tr>

<tr>
  <td>I. Kegiatan yang apabila<br>ternyata diperhitungkan telah menimbulkan 100<br>perjalanan (kendaraan) baru pada Jam padat<br>danz atau menimbulkan rata-rata 700 perjalanan<br>(kendaraan) baru setiap harinya pada jalan yang<br>dipengaruhi oleh adanya bangunan atau<br>permukiman atau infrastruktur yang<br>dibangun atau dikembangkan.</td>
  <td>Wajib</td>
  <td>Bangkitan Rendah</td>
</tr>

</table>
    </div>
    <div  style="padding: 20px;background-color:yellow;margin-top:50px;text-align:center;">
      CP: (0342)555330 (Dinas Perhubungan Kab.Blitar)<br>
      <a style="background-color:transparent;border:transparent;" href="https://www.instagram.com/dishub_kabblitar?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><img src="img/ig1.png" style="width: 5%;"></a>
      <a style="background-color:transparent;border:transparent;" href="https://www.youtube.com/@dinasperhubungankab.blitar4103"><img src="img/lgyt1.png" style="width:5%;"></a>
    </div>
    <footer>
      &copy; 2024 ATCS Dinas Perhubungan Kab.Blitar, Semua hak cipta dilindungi.
    </footer>
    <!-- feather icon -->
    <script>    
      feather.replace();

      document.getElementById('show-table-btn').addEventListener('click', function() {
            const tableContainer = document.getElementById('table-container');
            if (tableContainer.style.display === 'none' || tableContainer.style.display === '') {
                tableContainer.style.display = 'block';
            } else {
                tableContainer.style.display = 'none';
            }
        });
    </script>
  </body>
</html>
