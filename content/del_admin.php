<div class="author">
<h1 class="center">Укажите причину отклонения</h1>
<form action="" method="post" class="form_input">

        <input type="tel" tabindex="1" required name="com" class="info_input" > 
        <button type="submit" class="info_input info_input_button">Отклонить</button>

    </form>
</div>
<?php
$id_product = $_GET['id'];
if($_POST['com']){
$push = "UPDATE `booking` SET `status_booking` = 'del' WHERE `booking`.`id_booking` = ".$id_product.";";
$tovar = mysqli_query($atmostfera_db, $push);
$push = "UPDATE `booking` SET `comment` = '".$_POST['com']."' WHERE `booking`.`id_booking` = ".$id_product.";";
$tovar = mysqli_query($atmostfera_db, $push);
echo "<script>window.location.href='admin'</script>";
}
?>