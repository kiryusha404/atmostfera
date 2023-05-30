<?php
    include('basis/connect.php');
    if($_SESSION['id_us']){
        header('Location: index');
    }
    include('basis/header.php');
    include('content/authorization.php');
    include('basis/footer.php');
?>