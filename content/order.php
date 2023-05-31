<?php
    $push = 'SELECT * FROM booking JOIN users ON booking.id_user_fk = users.id_user JOIN sphere ON booking.id_sphere_fk = sphere.id_sphere WHERE booking.id_user_fk = '.$_SESSION['id_us'].' ORDER BY `booking`.`id_booking` DESC';
    $order = mysqli_query($atmostfera_db, $push);
?>
<div class="order">
    <?php
        while($row = mysqli_fetch_array($order)){
    ?>
<div class="order_element">
    <?php
        $pus = 'SELECT * FROM `sphere_img` join img_product ON sphere_img.id_img_fk = img_product.id_img where sphere_img.id_sphere_fk = '.$row['id_sphere'].' limit 1';
        $img = mysqli_query($atmostfera_db, $pus);
        $imgo = mysqli_fetch_array($img);
    ?>
    <img class="order_in" src="<?php echo $imgo['ucr_img']; ?>" alt="фото сферы">
    <h4 class="order_in"><?php echo $row['name_sphere']; ?></h4>
    <p class="order_in">Бронирование с </p>
    <p class="order_in"><?php echo date('d.m.y', strtotime($row['date1'])); ?></p>
    <p class="order_in"> по </p>
    <p class="order_in"><?php echo date('d.m.y', strtotime($row['date2'])); ?></p>
    <p class="order_in"> Статус: </p>
    <p class="order_in"><?php echo $row['status_booking']; ?></p>
    <?php
        if($row['status_booking']=='del'){
    ?>
        <p class="order_in">Причина отказа: <?php echo $row['comment']; ?></p>
    <?php
        }
    ?>
    <?php
        if($row['status_booking']=='new'){
    ?>
        <button class="order_in" onclick="document.location='transform_order?id=<?php echo $row['id_booking']; ?>'">Редактировать</button>
        <button class="order_in" onclick="document.location='delete_order?id=<?php echo $row['id_booking']; ?>'">Отменить</button>
    <?php
        }
    ?>
</div>
<?php } ?>
</div>