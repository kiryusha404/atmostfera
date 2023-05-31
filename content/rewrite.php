<?php
    $id_tovar = $_GET['id'];
    $push = "select * from sphere where id_sphere = ".$id_tovar."";
    $data = mysqli_query($atmostfera_db, $push);
    $res = mysqli_fetch_array($data);   
?>
<div class="add_tovar_admin">
    <form action="rewrite_tovar?id=<?php echo $id_tovar;?>" method="post" enctype="multipart/form-data" class="tovar_add_form">
    <input type="file" required name="img" class="info_input" placeholder="Фото">
    <input type="text" required name="name" class="info_input" placeholder="Название" value="<?php echo $res['name_sphere'];?>">
    <input type="text" required name="price" class="info_input" placeholder="Цена" value="<?php echo $res['price_sphere'];?>">
    <input type="text" required name="aprice" class="info_input" placeholder="Цена со скидкой" value="<?php echo $res['aprice_sphere'];?>">
    <input type="text" required name="col" class="info_input" placeholder="Вместимость" value="<?php echo $res['capacity_sphere'];?>">
    <input type="text" required name="mass" class="info_input" placeholder="Площадь" value="<?php echo $res['square_sphere'];?>">
    <input type="text" required name="info" class="info_input" placeholder="Описание" value="<?php echo $res['description_sphere'];?>">
    <button type="submit" class="add_but">Изменить</button>
    </form>
</div>