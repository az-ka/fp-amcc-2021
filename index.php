<?php
//Koneksi = Menghubungkan Php Ke DataBase
$server = "localhost"; //Nama Server
$user = "root"; //Id
$pass = ""; //Pass Apabila Database Tidak Berpassword Kosongkan Saja
$database = "db_amcc"; //Nama Data Base (Harus Sama)

$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi)); //Untuk Menjalankan Nya Menggunakan Variable $koneksi(Atau Bisa Variable Lain Bebas) = mysqli_connect(Massukkan Variable Diatas Mulai Dari $server - $database) Jika False/Tidak Konek/Terjadi Kesalahan Maka Akan Terjadi Error


//Simpan Dan Edit
if (isset($_POST['simpan'])) { //If Else (isset = Untuk Memeriksa(Apakah $_POST Dengan Variable simpan Berisi Atau Tidak))
    //
    if (isset($_GET['hal']) && $_GET['hal'] == 'edit') { //Jika (Memeriksa(Variable Pada $_GET ['hal'])) 2x &&= Dan(AND), Bervariable edit Maka =
        //Data Baru, Variable $edit = Akan Menampung(Variable $koneksi, Dan Akan Di UPDATE Ke Data Base tutang yaitu Berupa = variable, name, nom, ket. Dan WHERE = Untuk Memfilter Variable Id, Karena Disini Id Bersifat Tidak Sama/Berbeda)
        //Echo "Setelah Itu Akan Auto Merefresh Halaman Tersebut"
        $edit = mysqli_query($koneksi, "UPDATE tutang set

        name = '$_POST[name]',
        nom = '$_POST[nom]',
        ket = '$_POST[ket]'
        where id = '$_GET[id]'
        ");
        echo "<meta http-equiv=refresh content=0;URL='index.php'>";
    } else { //Jika Tidak Maka File Akan DiSimpan Ke Dalam Data Base, Yaitu INSERT Into Nama Database tutang
        mysqli_query($koneksi, "insert into tutang set
        name = '$_POST[name]',
        nom = '$_POST[nom]',
        ket = '$_POST[ket]'
        ");
    }
}



//Pengujian Jika Tombol Edit Dan Delete Diklik Maka
if (isset($_GET['hal'])) { //Jika(Tidak Kosong/Berisi Data Maka String/Variable $_GET hal)
    if ($_GET['hal'] == "edit") { //Tombol Edit
        //Maka Menampilkan Data Yang Mana Akan Diedit Dari Database tutang Dengan Menyeleksi id
        $tampil = mysqli_query($koneksi, "SELECT * FROM tutang WHERE id = '$_GET[id]' "); //Menampung Data Ke Variable $tampil
        $data = mysqli_fetch_array($tampil); //Untuk Menangkap Data Dari Variable $tampil Ke $data
        if ($data) { //Jika Data Sesuai Dengan Maka Ke UPDATE/ Edit, Varuable Tersebut Sesuai Varibale Input Yaitu Di Value Php($vname - $ket)
            $vname = $data['name'];
            $vnom = $data['nom'];
            $vket = $data['ket'];
        }
    } else if ($_GET['hal'] == "hapus") { //Jika Klik hapus Maka Hapus
        //Hapus
        $hapus = mysqli_query($koneksi, "DELETE FROM tutang WHERE id = '$_GET[id]' "); //Dengan Query DELETE
    }
}


?>



<!DOCTYPE html>
<html>

<head>
    <!-- Judul -->
    <title>Catatan Hutang</title>

    <!-- Css Bootstap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">


    <!-- My Css -->
    <style>
        .cover {
            width: 100%;
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(cover.jpg);
            background-size: cover;
        }

        h1 {
            padding-top: 20px;
        }

        h2 {
            padding-bottom: 10px;
        }

        h1,
        h2 {
            color: white;
        }

        h3 {
            color: white;
        }

        .input-from {
            position: relative;
        }

        .input-from input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            letter-spacing: 1px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
        }

        .input-from label {
            position: absolute;
            top: 0;
            left: 0;
            letter-spacing: 1px;
            font-size: 16px;
            color: #fff;
            transition: 0.5s;
        }

        .input-from input:focus~label,
        .input-from input:valid~label {
            top: -20px;
            left: 0;
            font-size: 12px;
            color: #03a9f4;
        }

        .mutiara p {
            text-align: center;
            margin-top: 20px;
        }

        .mutiara .hadits {
            border-top: 2px solid white;
            padding-top: 10px;
        }

        .mutiara .dan {
            margin: 0;
            padding: 0;
        }

        .aksi {
            width: 20%;
        }

        footer img {
            width: 300px;
            display: block;
            margin: auto;
            padding-top: 10px;
        }

        footer p {
            margin: 0;
            padding: 0;
            text-align: center;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .tim {
            margin-top: 7px;
        }
    </style>
</head>

<body>
    <div class="cover" style="width: 100%;">
        <h1 class="text-center">Catatan Hutang</h1>
        <h2 class="text-center">2021</h2>
        <div class="container">
            <div class="row" style="display:flex; align-items:center; justify-content:center">
                <!-- Input Data -->
                <h3>
                    <?php
                    //Session : Penyimpanan Variable Yang Bisa/Dapat Disimpan Lebih Dari 1 Halaman
                    session_start(); //Untuk Memulai Eksekusi Session Pada Server Dan Menyimpannya Ke Browser
                    $name = $_POST['nme'] ?? $_SESSION['nme'] ?? ''; //Variable Name = Dengan Menthod POST(Yaitu Langsung Ke Action Tanpa Menampilkan Di URL), Dan ?? : Merupakan If Else, Apakah Variable nme Bernilai Benar/Salah/Kosong? Maka Akan Digantikan Oleh Variable Session, Dan Apabila Masih Salh Makas Isi Variable '': Kosong
                    $_SESSION['nme'] = $name; //Variable Session = Variable $name
                    echo "Welcome, " . $name; //echo : Menampilkan Program (Welcome, ) Dan Titik : Menghubungkan 2 Variable "Welcome, " Dan $name
                    ?>
                </h3>
                <div class="card text-white bg-dark mb-3" style="max-width: 30rem; align-self:start; margin: 10px">
                    <div class="card-header">Masukkan Data</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="input-from" style="margin-top: 10px">
                                <!-- Variable Php Yaitu vname -->
                                <input type="text" value="<?= @$vname ?>" name="name" autocomplete="off" required>
                                <label for="name">Name</label>
                            </div>

                            <div class="input-from">
                                <!-- Variable Php Yaitu vnom -->
                                <input type="text" value="<?= @$vnom ?>" name="nom" autocomplete="off" required>
                                <label for="nom">Nominal</label>
                            </div>

                            <div class="input-from">
                                <!-- Variable Php Yaitu vket -->
                                <input type="text" value="<?= @$vket ?>" name="ket" autocomplete="off" required>
                                <label for="ket">Keterangan</label>
                            </div>
                            <div class="submit">
                                <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                                <button type="reset" class="btn btn-danger" name="reset">Kosongkan</button>
                            </div>
                        </form>
                        <div class="mutiara">
                            <p class="hadits">“Semua dosa orang yang mati syahid akan diampuni kecuali hutang." <br> (HR Muslim Nomor 1886)</p>
                            <p class="dan">~Dan~</p>
                            <p class="ulama">"Barangsiapa yang mati dalam keadaan masih memiliki hutang satu dinar atau satu dirham, maka hutang tersebut akan dilunasi dengan kebaikannya (di hari kiamat nanti) karena di sana (di akhirat) tidak ada lagi dinar dan dirham." (HR. Ibnu Majah ).</p>
                        </div>
                    </div>
                </div>
                <!-- Input Data Akhir -->

                <!-- Output Data -->
                <div class="card text-dark bg-light mb-3" style="max-width: 50rem; margin: 10px">
                    <div class="card-header">Catatan Hutang</div>
                    <div class="card-body ">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                    <th class="aksi">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1; //Variable $no/ Nomer Akan Dimulai Dari Angka 1
                            $tampil = mysqli_query($koneksi, "SELECT * from tutang "); //Menampung Query SELECT Dari Database tutang Ke Variable $tampil
                            //Rupiah (Merubah Angka/data Berupa Angka Ke Rupiah)
                            function formatRupiah($angka) //function Untuk Melakukan Tugas Secara Berulang Ulang
                            {
                                $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                return $hasil_rupiah;
                            }
                            while ($data = mysqli_fetch_array($tampil)) : //Mengulang Variable $data
                            ?>
                                <tbody>
                                    <tr>
                                        <!-- Menampilkan Data Yang Telah Diinputkan -->
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['name'] ?></td>
                                        <td><?= formatRupiah($data['nom']) ?></td>
                                        <td><?= $data['ket'] ?></td>
                                        <td>
                                            <a href="index.php?hal=edit&id=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                                            <!-- Tombol Edit -->
                                            <a href="index.php?hal=hapus&id=<?= $data['id'] ?>" class="btn btn-danger">Hapus</a>
                                            <!-- Tombol Hapus -->
                                        </td>
                                    </tr>
                                </tbody>
                            <?php
                            endwhile; //Mengakhiri Perulangan Diatas
                            ?>
                        </table>
                    </div>
                </div>
                <footer class="fp shadow-sm">
                    <img src="Final.png">
                    <p class="tim">Aldzi Fadlian Azka | Sandy Arya Fadillah | Firdana Amanaturrokhim | Fasilitator Tim : Muhammad Rafly Indrawan</p>
                </footer>
                <!-- Output Data Akhir -->
            </div>
        </div>

</body>

</html>