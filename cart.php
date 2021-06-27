<?php 
include "config.php";

$query_cek_id = mysqli_query($db, "SELECT * FROM CART");
$row_cek_id = mysqli_fetch_assoc($query_cek_id);
// $id = $_GET['id_user'];
if(isset($_POST['update'])) {
    $arrQuantity = $_POST['quantity'];
    // $cart = unserialize(serialize($_SESSION['cart']));
    for($i=0; $i<count($cart);$i++) {
       $cart[$i]->quantity = $arrQuantity[$i];
    }
    $_SESSION['cart'] = $cart;
  }



$query = mysqli_query($db, "UPDATE `cart` SET `GRAND_TOTAL` = '12' WHERE `cart`.`ID_CART` = 3001")
?>
