<?php
    include('basis/connect.php');
    if($_SESSION['role_us'] != 'admin'){
        header('Location: index');
    }
    if($_FILES['img'] && $_POST['name'] && $_POST['price'] && $_POST['col'] && $_POST['mass'] && $_POST['info']){

        $img = $_FILES['img'];
        $url = $img['name'];
        $pathfile = __DIR__ .'/img/sphere/'.$url;

        if(!move_uploaded_file($img['tmp_name'], $pathfile)){
            echo 'Файл не смог загрузиться';
        }

        $push = 'INSERT INTO `sphere` (`id_sphere`, `name_sphere`, `price_sphere`, `aprice_sphere`, `capacity_sphere`, `square_sphere`, `description_sphere`) VALUES (NULL, "'.$_POST['name'].'", "'.$_POST['price'].'", "0", "'.$_POST['col'].'", "'.$_POST['mass'].'", "'.$_POST['info'].'");';
        $add = mysqli_query($atmostfera_db, $push);
        $push = 'INSERT INTO `img_product` (`id_img`, `ucr_img`) VALUES (NULL, "img/sphere/'.$url.'");';
        $add = mysqli_query($atmostfera_db, $push);
        $push = 'INSERT INTO `sphere_img` (`id_sphere_fk`, `id_img_fk`) VALUES ((Select id_sphere from sphere where name_sphere = "'.$_POST['name'].'"), (SELECT id_img FROM img_product WHERE ucr_img = "img/sphere/'.$url.'"));';
        $add = mysqli_query($atmostfera_db, $push);
    }
    echo "<script>window.location.href='sphere'</script>";
?>