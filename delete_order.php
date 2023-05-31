<?php
include('basis/connect.php');
$id_product = $_GET['id'];
if(!$_SESSION['id_us']){
    header('Location: index');
}
$push = "DELETE FROM `booking` WHERE `booking`.`id_booking` = ".$id_product."";
$tovar = mysqli_query($atmostfera_db, $push);
echo "<script>window.location.href='order'</script>";
?>