<?php
    include('basis/connect.php');
    if($_SESSION['role_us'] != 'admin'){
        header('Location: index');
    }
    include('basis/header.php');
    include('content/del_admin.php');
    include('basis/footer.php');
?>