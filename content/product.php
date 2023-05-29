<?php 
    $id_product = $_GET['id'];
    $push = 'SELECT * FROM sphere_img JOIN img_product ON sphere_img.id_img_fk = img_product.id_img WHERE sphere_img.id_sphere_fk = '.$id_product.' limit 5';
    $img = mysqli_query($atmostfera_db, $push);
?>

    <div class="carousel-item active">
    <?php while($img_tovar = mysqli_fetch_array($img)){ ?>
      <img src="<?php echo $img_tovar['ucr_img']; ?>" class="d-block w-100" alt="...">
    </div>
    <?php } ?>
    <?php 
    $push = 'SELECT * FROM `sphere` where id_sphere = '.$id_product.'';
    $tovar = mysqli_query($atmostfera_db, $push);
    $tovar_p = mysqli_fetch_array($tovar)
    
?>
<p><?php echo $tovar_p['name_sphere']; ?></p>
<p><?php echo $tovar_p['price_sphere']; ?></p>
<p><?php echo $tovar_p['capacity_sphere']; ?></p>
<p><?php echo $tovar_p['square_sphere']; ?></p>
<p><?php echo $tovar_p['description_sphere']; ?></p>