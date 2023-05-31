<?php
    include('basis/connect.php');
    if($_SESSION['role_us'] != 'admin'){
        header('Location: index');
    }
    $id_tovar = $_GET['id'];
    $img = $_FILES['img'];

    if($_POST['name']){
        $push = 'UPDATE `sphere` SET `name_sphere` = "'.$_POST['name'].'" WHERE `sphere`.`id_sphere` = '.$id_tovar.';';
        $res = mysqli_query($atmostfera_db, $push);
    }

    if($_POST['price']){
        $push = 'UPDATE `sphere` SET `price_sphere` = "'.$_POST['price'].'" WHERE `sphere`.`id_sphere` = '.$id_tovar.';';
        $res = mysqli_query($atmostfera_db, $push);
    }

    if($_POST['aprice']){
        $push = 'UPDATE `sphere` SET `aprice_sphere` = "'.$_POST['aprice'].'" WHERE `sphere`.`id_sphere` = '.$id_tovar.';';
        $res = mysqli_query($atmostfera_db, $push);
    }

    if($_POST['col']){
        $push = 'UPDATE `sphere` SET `capacity_sphere` = "'.$_POST['col'].'" WHERE `sphere`.`id_sphere` = '.$id_tovar.';';
        $res = mysqli_query($atmostfera_db, $push);
    }

    if($_POST['mass']){
        $push = 'UPDATE `sphere` SET `square_sphere` = "'.$_POST['name'].'" WHERE `sphere`.`id_sphere` = '.$id_tovar.';';
        $res = mysqli_query($atmostfera_db, $push);
    }

    if($_POST['info']){
        $push = 'UPDATE `sphere` SET `description_sphere` = "'.$_POST['info'].'" WHERE `sphere`.`id_sphere` = '.$id_tovar.';';
        $res = mysqli_query($atmostfera_db, $push);
    }

    if($img['name']){
        $url = $img['name'];
        $pathfile = __DIR__ .'/img/sphere/'.$url;

        if(!move_uploaded_file($img['tmp_name'], $pathfile)){
            echo 'Файл не смог загрузиться';
        }

        $push = 'INSERT INTO `img_product` (`id_img`, `ucr_img`) VALUES (NULL, "img/sphere/'.$url.'");';
        $add = mysqli_query($atmostfera_db, $push);
        $push = 'INSERT INTO `sphere_img` (`id_sphere_fk`, `id_img_fk`) VALUES ('.$id_tovar.', (SELECT id_img FROM img_product WHERE ucr_img = "img/sphere/'.$url.'"));';
        $add = mysqli_query($atmostfera_db, $push);
    }

    echo "<script>window.location.href='product?id=".$id_tovar."'</script>";
?>