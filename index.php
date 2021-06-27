<?php 
include "config.php";
$query = mysqli_query($db, "SELECT * FROM PELANGGAN");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <style>
        /* body{
            background-color: grey;
        }
        th{
            color: aqua;
        }
        td{
            color: beige;
        } */
    </style>
    <title>Document</title>
</head>
<body>
    <!-- Navbar -->
    <!-- <header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contact</h4>
            <ul class="list-unstyled">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php  ">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="pilih.php">Produk</a>
                </li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
            <strong>Album</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
    </div>
    </header> -->


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
    <button type="button" class="btn btn-primary mt-5 ms-4 mb-3">Primary</button>
        <div class="row">
        
            <div class="col">
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 0;
                        while($row = mysqli_fetch_assoc($query)) : 
                            $no++;
                        ?>
                        <form action="pilih.php" method="post">
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['NAMA_PELANGGAN'] ?></td>
                                <td>
                                <a href="pilih.php?id_user=<?= $row['ID_PELANGGAN'] ?>">
                                <button type="button" name="pilih" class="btn btn-primary">Pilih</button></td>
                                </a>
                            </tr>
                        </form>
                        <?php endwhile; ?>>

                    </tbody>
                </table>
                <!-- Table -->
            </div>
            <div class="col">
                
            </div>
        </div>
    </div>
    
</body>
</html>
