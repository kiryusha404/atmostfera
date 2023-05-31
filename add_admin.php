<?php
include('basis/connect.php');
$id_product = $_GET['id'];
if($_SESSION['role_us'] != 'admin'){
    header('Location: index');
}
$push = "UPDATE `booking` SET `status_booking` = 'add' WHERE `booking`.`id_booking` = ".$id_product.";";
$tovar = mysqli_query($atmostfera_db, $push);
echo "<script>window.location.href='admin'</script>";
?>