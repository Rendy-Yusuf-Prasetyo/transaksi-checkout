<?php 
include "config.php";


    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $deksripsi = $_POST['deskripsi'];
        // $foto = $_POST['file'];

        // $targer_dir = "gambar/";
        // $name_photo = $_FILES['file']['name'];
        // $target_file = $targer_dir . basename($name_photo);
        // $uploadOK = 1;
        // $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // CEK GAMBARNYA BENERAN APA GA
        
            
        $ekstensi_diperboleh = array('png', 'jpg');
        $nama_foto = basename($_FILES['file']['name']);
        $x = explode('.', $nama_foto);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['file']['size'];
        $file_temp = $_FILES['file']['tmp_name'];

        if(in_array($ekstensi, $ekstensi_diperboleh) === true){
            if($ukuran > 10440700){
            
                echo "
                    <script>
                        alert('Ukuran File Terlalu Besar');
                    </script>
                ";
            }
        }else{
            echo "
                <script>
                    alert('Eksetensi Yang diperbolehkan Hanya jpg dan png');
                </script>
            ";
        }
        move_uploaded_file($file_temp, 'gambar/' . $nama_foto);
        $cek_nama_barang = mysqli_query($db, "SELECT * FROM barang");
                
        while($row_nama_barang = mysqli_fetch_assoc($cek_nama_barang)){
            $nama_barang = $row_nama_barang['NAMA_BARANG'];
            if ($nama_barang == null) {
                mysqli_query($db, "INSERT INTO BARANG VALUES(2001, '$nama', '$harga', '$stok', '$deksripsi', '$nama_foto')");
                echo "
                    <script>
                        alert('Data sukses ditambahkan');
                    </script>
                ";
                break;
            }else if($nama_barang != $nama){
                mysqli_query($db, "INSERT INTO BARANG VALUES('', '$nama', '$harga', '$stok', '$deksripsi', '$nama_foto')");
                echo "
                    <script>
                        alert('Data sukses ditambahkan');
                    </script>
                ";
                break;
            }else if($nama_barang == $nama){
                echo "
                    <script>
                        alert('Data Gagal ditambahkan');
                    </script>
                ";
            // break;
            }
        }
        // $row_id_barang = mysqli_fetch_assoc($cek_id_barang);

        // mysqli_query($db, "INSERT INTO BARANG VALUES('', '$nama', '$harga', '$stok', '$deksripsi')");
        // echo "
        //     <script>
        //         alert('Data sukses ditambahkan');
        //     </script>
        // ";
        

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include "bootstrap.php";
    ?>
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="nama">Harga</label>
                    <input type="text" class="form-control" name="harga" id="nama" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="nama">Stok</label>
                    <input type="text" class="form-control" name="stok" id="nama" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="nama">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" id="nama" name="address" required>
                </div>
                <div class="mb-3">
                    <!-- <label class="input-group-text" for="inputGroupFile01">Upload Gambar</label> -->
                    <label for="foto">Input Foto</label>
                    <input type="file" class="form-control" name="file" id="foto">
                </div>
                <div class="mb-3">
                    <button type="submit" name="simpan" class="btn btn-primary">simpan</button>
                </div>
            </form>
        </div>
    </div>
  </body>
</body>
</html>