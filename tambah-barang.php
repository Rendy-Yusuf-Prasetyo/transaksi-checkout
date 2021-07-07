<?php 
include "config.php";


    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $deksripsi = $_POST['deskripsi'];
        $foto = $_POST['foto'];

        $targer_dir = "gambar/";
        $name_photo = $_FILES['foto']['name'];
        $target_file = $targer_dir . basename($name_photo);
        $uploadOK = 1;
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // CEK GAMBARNYA BENERAN APA GA
        
        $check = getimagesize($_FILES['foto']['tmp_name']);
        if($check === true){
            echo "File is an image - " . $check["mie"] . ".";
            $uploadOK = 1;
        }else{
            // echo "File is not an image";
            echo "
                <script>
                    alert('File is not an image');
                </script>
            ";
            $uploadOK = 0;
        }

        // CEK FILE SUDAH ADA APA BELUM
        if(file_exists($target_file)){
            // echo "File already exist";
            echo "
            <script>
                alert('File already exist');
            </script>
            ";
            $uploadOK = 0;
        }

        // CEK UKURAN FILE
        if($_FILES['foto']['size'] > 500000){
            // echo "File is too large";
            echo "
            <script>
                alert('File is too large');
            </script>
            ";
            $uploadOK = 0;
        }

        // Format yang dibolehkan
        if($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif"){
            // echo "File not allowed format";
            echo "
            <script>
                alert('File not allowed format');
            </script>
            ";
            $uploadOK = 0;
        }

        // cek jika $uploadOK = 0 itu error
        if($uploadOK == 0){
            echo "File was not uploaded";
            echo "
            <script>
                alert('File was not uploaded');
            </script>
            ";
            // if not = 0
        }else{
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                echo "the File" . htmlspecialchars(basename($_FILES['foto']['tmp_name'])) . "has been uploaded";
            }else{
                echo "Sorry, there was an error uploading your file.";
                echo "
                <script>
                    alert('Sorry, there was an error uploading your file.');
                </script>
                ";
            }
        }

        $cek_nama_barang = mysqli_query($db, "SELECT * FROM barang");
        while($row_nama_barang = mysqli_fetch_assoc($cek_nama_barang)){
            $nama_barang = $row_nama_barang['NAMA_BARANG'];
            if ($nama_barang == null) {
                mysqli_query($db, "INSERT INTO BARANG VALUES(2001, '$nama', '$harga', '$stok', '$deksripsi', $name_photo)");
                echo "
                    <script>
                        alert('Data sukses ditambahkan');
                    </script>
                ";
                break;
            }else if($nama_barang != $nama){
                mysqli_query($db, "INSERT INTO BARANG VALUES('', '$nama', '$harga', '$stok', '$deksripsi', '$name_photo)");
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
            <form action="" method="post enctype="multipart/form-data">
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
                    <input type="file" class="form-control" name="foto" id="foto">
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