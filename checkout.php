<?php 
include "config.php";
$query_cek_id_item = mysqli_query($db, "SELECT * FROM CART_ITEM");


// if (isset($_POST['banyak'])) {
//   $banyak = $_POST['banyak'];
//   while($row = mysqli_fetch_assoc($query_cek_id_item)){
//     $id_cart_item = $row['ID_CART_ITEM'];
//     var_dump($id_cart_item);
//   }
//   mysqli_query($db, "UPDATE CART_ITEM SET QUANTITY = $banyak WHERE CART_ITEM = $id_cart_item");
// }

// var_dump($_POST['banyak']);

$query = mysqli_query($db, "SELECT * FROM BARANG a JOIN PElANGGAN b JOIN TRANSAKSI c ON a.ID_BARANG = b.ID_PElANGGAN = c.ID_TRANSAKSI");
$query_ongkir = mysqli_query($db, "SELECT * FROM CART");
$row_ongkir = mysqli_fetch_assoc($query_ongkir);
$row = mysqli_fetch_assoc($query);
$id = $_GET['id_cart'];
$row_cart = $row_ongkir['GRAND_TOTAL'];

$row_ongkir['GRAND_TOTAL'];
// var_dump($id);
if (isset($_POST['lanjutkan'])) {
  $cek = mysqli_query($db, "INSERT INTO TRANSAKSI VALUES('','','$id','')");
};

  $query_join = mysqli_query($db, "SELECT * FROM CART_ITEM a JOIN BARANG b ON a.ID_BARANG = b.ID_BARANG");
  
  if (isset($_POST['lanjutkan'])) {
    $banyak = $_POST['quantity']; 
    while($row = mysqli_fetch_assoc($query_join)) {
      $total = $row['HARGA'] * $row['QUANTITY'];
      mysqli_query($db, "UPDATE `cart` SET `GRAND_TOTAL` = '$total' WHERE `cart`.`ID_CART` = '$id'");
    }
  }

  $jumlah = 0;
  $jumlah_1 = mysqli_query($db, "SELECT * FROM BARANG a JOIN CART_ITEM b ON a.ID_BARANG = b.ID_BARANG WHERE ID_CART = '$id'");
      while ($tabel = mysqli_fetch_assoc($jumlah_1)) {
          $data = $tabel['HARGA'];
          // return $data;
          $jumlah = $jumlah+$data;
      }
      echo "HASILNYA" . $jumlah;

  
      $total_semua = $row_ongkir['DELIVERY_CHARGE'] + $jumlah;
echo $total_semua;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Checkout example for Bootstrap</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Checkout form</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>
      <?php 
      $query = mysqli_query($db, "SELECT * FROM CART_ITEM a JOIN BARANG b ON b.ID_BARANG = a.ID_BARANG");
      $row = mysqli_fetch_assoc($query);
      ?>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
          
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Biaya Ongkir</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">Rp.<?= $row_ongkir['DELIVERY_CHARGE'] ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Total Harga</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">Rp.<?= $jumlah ?></span>  
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (Rupiah)</span>
              <strong><?= $total_semua ?></strong>
            </li>
          </ul>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nama</label>
                <input type="text" class="form-control" name="nama" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" required>
                  <!-- <small class="text-muted">Full name as displayed on card</small> -->
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="country">Country</label>
                  <input type="text" class="form-control" id="country" placeholder="Indonesia" name="country" required>
                    <!-- <small class="text-muted">Full name as displayed on card</small> -->
                  <div class="invalid-feedback">
                    Country name is required
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="zip">Zip Code</label>
                  <input type="text" class="form-control" id="zip" placeholder="60153" name="zip" required>
                    <!-- <small class="text-muted">Full name as displayed on card</small> -->
                  <div class="invalid-feedback">
                    Zip is required
                  </div>
              </div>
            </div>

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="Credit Card" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="Debit Card" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" value="Paypal" required>
                <label class="custom-control-label" for="paypal">Paypal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" name="nama_card" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" name="credit_cart_number" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" name="expired" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" name="CVV" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
