<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Upload File Dengan PHP Dan MySQL | www.malasngoding.com</title>
</head>
<body>
    <?php 
        include "config.php";
        if($_POST['upload']){
            $ekstensi_diperbolehkan = array('png', 'jpg');
            $nama = basename($_FILES['file']['name']);
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];

            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'gambar/'.$nama);
                    $query = mysqli_query($db, "INSERT INTO coba_upload VALUES('', '$nama')");
                    if($query){
                        echo "FILE SUKSES";
                    }else{
                        echo "FILE GAGAL";
                    }
                }else{
                    echo "FILE KEBESARAN";
                }
            }else{
                echo "EKSTENSI GABOLEH";
            }
        }
    ?>
        <br>
        <br>
        <a href="upload.php" >UPLOAD LAGI</a>
        <br>
        <br>

        <table>
            <?php 
                $data = mysqli_query($db, "SELECT * FROM coba_upload");
                while($d = mysqli_fetch_array($data)) :
            ?>
            <tr>
                <td>
                    <img src="<?= "gambar/" . $d['nama'] ?>" alt="ini foto">
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
</body>
</html>