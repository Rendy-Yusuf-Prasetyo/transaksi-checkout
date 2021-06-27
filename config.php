<?php 
    $db = mysqli_connect("localhost", "root", "", "belanja"); (!$db) ? "Erorr di " . mysqli_connect_error() : null;
?>