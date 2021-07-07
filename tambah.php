<?php 
include "config.php";
// $id = $_GET['id_user'];
$query = mysqli_query($db, "SELECT * FROM BARANG a JOIN PElANGGAN b JOIN TRANSAKSI c ON a.ID_BARANG = b.ID_PElANGGAN = c.ID_TRANSAKSI");
$query_cek_id = mysqli_query($db, "SELECT * FROM CART");

$row_cek_id = mysqli_fetch_assoc($query_cek_id);
// $id_user = $_GET['id_user'];
$id_cart = $row_cek_id['ID_CART'];
// if (isset($_POST['pilih'])) {
//     if ($_GET['id_user'] == $row_cek_id['ID_PELANGGAN']) {
//         echo "ID TIDAK ADA";
//         $pesan = "tidak ada";
//         echo "<h1>tidak ada</h1>";
//     }else{
//         echo "<h1> ada</h1>";
//     }
// }
if(isset($_GET['id_user'])){
    $id = $_GET['id_user'];
    if ($_GET['id_user'] == $row_cek_id['ID_PELANGGAN']) {
      echo "<h1> ada</h1>";
      var_dump($row_cek_id['ID_PELANGGAN']);
      var_dump($_GET['id_user']);
      
  }
  if (isset($_GET['id'])) {
    //   mysqli_query($db, "UPDATE `cart_item` SET `ID_CART` = '$row_cek_id['$row_cek_id['ID_CART']' WHERE `cart_item`.`ID_CART_ITEM` = 4001")
    mysqli_query($db, "INSERT INTO CART_ITEM VALUES('','$id_cart','$id','')");
    var_dump($_GET['id']);
  }

}else{
  echo "<h1>tidak ada</h1>";
  mysqli_query($db, "INSERT INTO CART VALUES('','$id','','')");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <?php 
    include "bootstrap.php";
    ?>
    <title>Album example · Bootstrap v5.0</title>

  

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>    
    
</html>
