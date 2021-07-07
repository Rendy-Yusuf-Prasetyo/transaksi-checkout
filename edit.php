<?php include "config.php"; 
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    // $update = $_POST['update'];

       mysqli_query($db, "UPDATE BARANG SET NAMA_BARANG = '$nama', HARGA = '$harga', stok = '$stok', deskripsi = '$deskripsi' WHERE ID_BARANG = '$id'");
       
       header("Location: pilih.php");
       
    }
$query = mysqli_query($db,"SELECT * FROM PELANGGAN");
$row = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    
    <title>Document</title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index2.php">E-commerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item m-auto">
                    <a class="nav-link" href="index2.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pilih.php">Product</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="cart-item.php">Cart <span class="sr-only">(current)</span></a>
                </li>
            </ul>

            <!-- <form class="form-inline my-2 my-lg-0">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary btn-number">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <a class="btn btn-success btn-sm ml-3" href="cart.html">
                    <i class="fa fa-shopping-cart"></i> Cart
                    <span class="badge badge-light"></span>
                </a>
            </form> -->
        </div>
    </div>
</nav>
<!-- Navbar -->

    <div class="container">
        <div class="row">
            <form action="" method="post">
                <?php 
                $query = mysqli_query($db, "SELECT * FROM BARANG WHERE ID_BARANG = '$id'");
                $row = mysqli_fetch_assoc($query);
                    ?>
                <div class="mb-3">
                    <label for="nama" class="form-label">nama</label>
                    <input type="name" class="form-control" id="nama" name="nama" placeholder="<?= $row['NAMA_BARANG']; ?>">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">harga</label>
                    <input type="name" class="form-control" id="harga" name="harga" placeholder="<?= $row['HARGA']; ?>">
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">stok</label>
                    <input type="name" class="form-control" id="stok" name="stok" placeholder="<?= $row['STOK']; ?>">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="name" class="form-control" id="deskripsi" name="deskripsi" placeholder="<?= $row['DESKRIPSI']; ?>">
                </div>
                    <a href="editlagi.php?id_user=<?= $row['ID_PELANGGAN']; ?>" >
                        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                    </a>
            </form>
        </div>
    </div>
</body>
</html>
