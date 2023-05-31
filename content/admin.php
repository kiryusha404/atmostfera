
    <form action="#" method="post" enctype="multipart/form-data" class="tovar_add_form">
    <p>Выбрать сортировку</p>
    <select name="cat" class="tovar_add_element" value="<?php echo $_POST['class']; ?>">
    <option value="all">Все</option>
    <option value="new">Новые</option>
    <option value="add">Подтвержденные</option>
    <option value="del">Отмененные</option>
    </select>
    <button type="submit" class="add_but">Применить фильтры</button>
</form>
<?php
    if($_POST['cat'] == 'all' || !$_POST['cat']){
    $push = 'SELECT * FROM booking JOIN users ON booking.id_user_fk = users.id_user JOIN sphere ON booking.id_sphere_fk = sphere.id_sphere ORDER BY `booking`.`id_booking` DESC';
    }else{
        $push = 'SELECT * FROM booking JOIN users ON booking.id_user_fk = users.id_user JOIN sphere ON booking.id_sphere_fk = sphere.id_sphere WHERE booking.status_booking = "'.$_POST['cat'].'" ORDER BY `booking`.`id_booking` DESC';
    }
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
    <h4 class="order_in"><?php echo $row['name_sphere']; ?></h4>
    <p class="order_in">Пользователь: <?php echo $row['name_user']; echo " "; echo $row['surname_user']; echo $row['patronymic_user'];?></p>
    <p class="order_in"> Бронь с <?php echo date('d.m.y', strtotime($row['time'])); ?></p>
    <p class="order_in">Бронирование с </p>
    <p class="order_in"><?php echo date('d.m.y', strtotime($row['date1'])); ?></p>
    <p class="order_in"> по </p>
    <p class="order_in"><?php echo date('d.m.y', strtotime($row['date2'])); ?></p>
    <p class="order_in"> Статус: </p>
    <p class="order_in"><?php echo $row['status_booking']; ?></p>
    <?php
        if($row['status_booking']=='new'){
    ?>
        <button class="order_in" onclick="document.location='add_admin?id=<?php echo $row['id_booking']; ?>'">Одобрить</button>
        <button class="order_in" onclick="document.location='del_admin?id=<?php echo $row['id_booking']; ?>'">Отклонить</button>
    <?php
        }
    ?>
</div>
<?php } ?>
</div>