<?php
    include('basis/connect.php');
    if(!$_SESSION['id_us']){
        header('Location: authorization');
    }
    include('basis/header.php');
    include('basis/footer.php');
?>