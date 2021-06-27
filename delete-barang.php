<?php 
include "config.php";
$id = $_GET['id_barang'];
// if (isset($_GET['id_barang'])) {
//     mysqli_query($db, "DELETE FROM barang WHERE ID_BARANG = '$id' ");
// }

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "DELETE FROM BARANG WHERE ID_BARANG = '$id'";

if ($db->query($sql) === true) {
    echo "Delete sukses";
}else{
    echo "Erorr: ".$db->error;
}

$db->close();

// if($hapus){
    
//     echo "
//     <script>
//         alert('terhapus');
//         location.replace('pilih.php');
//         </script>
//     ";
// }
// else{
    
//     echo"
        
//     <script>
//     alert('gagal dihapus');
//     // location.replace('pilih.php');
//     </script>

//     ";
// }
?>
