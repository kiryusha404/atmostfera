<?php
    include('basis/connect.php');
    if(!$_SESSION['id_us']){
        header('Location: authorization');
    }
    include('basis/header.php');
    include('content/order.php');
    include('basis/footer.php');
?>