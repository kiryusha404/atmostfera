<?php
    include('basis/connect.php');
    if($_SESSION['role_us'] != 'admin'){
        header('Location: index');
    }
    $id_tovar = $_GET['id'];
    $push = "DELETE FROM `sphere_img` WHERE `sphere_img`.`id_sphere_fk` = '".$id_tovar."'";
    $add = mysqli_query($atmostfera_db, $push);
    $push = 'DELETE FROM `sphere` WHERE `sphere`.`id_sphere` = "'.$id_tovar.'"';
    $add = mysqli_query($atmostfera_db, $push);
    echo "<script>window.location.href='sphere'</script>";
?>