<?php
    include('basis/connect.php');
    if($_SESSION['role_us'] != 'admin'){
        header('Location: index');
    }
    if($_FILES['img'] && $_POST['name'] && $_POST['info']){

        $img = $_FILES['img'];
        $url = $img['name'];
        $pathfile = __DIR__ .'/img/action/'.$url;

        if(!move_uploaded_file($img['tmp_name'], $pathfile)){
            echo 'Файл не смог загрузиться';
        }

        $push = 'INSERT INTO `action` (`id_action`, `name_action`, `info_action`, `img_action`, `status_action`) VALUES (NULL, "'.$_POST['name'].'", "'.$_POST['info'].'", "img/action/'.$url.'", "active");';
        $add = mysqli_query($atmostfera_db, $push);
    }
    echo "<script>window.location.href='sphere'</script>";
?>