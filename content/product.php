<?php 
    $id_product = $_GET['id'];
    $push = 'SELECT * FROM sphere_img JOIN img_product ON sphere_img.id_img_fk = img_product.id_img WHERE sphere_img.id_sphere_fk = '.$id_product.' ';
    $img = mysqli_query($atmostfera_db, $push);
?>
<div class="product">
<div class="img_tovar_">
    <?php while($img_tovar = mysqli_fetch_array($img)){ ?>
      <img src="<?php echo $img_tovar['ucr_img']; ?>"  alt="..." class="img_tovar">

    <?php } ?>
  </div>
    <?php 
    $push = 'SELECT * FROM `sphere` where id_sphere = '.$id_product.'';
    $tovar = mysqli_query($atmostfera_db, $push);
    $tovar_p = mysqli_fetch_array($tovar)
    
?>
<h3><?php echo $tovar_p['name_sphere']; ?></h3>
<p> Цена за сутки: <?php if($tovar_p['aprice_sphere'] == 0){echo $tovar_p['price_sphere'];}else{ echo $tovar_p['aprice_sphere']; ?> <s><?php echo $tovar_p['price_sphere'];} ?></s></p>
<p>Вместимость: <?php echo $tovar_p['capacity_sphere']; ?></p>
<p>Площадь: <?php echo $tovar_p['square_sphere']; ?></p>
<p>Описание: <?php echo $tovar_p['description_sphere']; ?></p>
    </div>