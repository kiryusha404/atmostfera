<?php
    $push = 'SELECT id_sphere, name_sphere, price_sphere, aprice_sphere FROM sphere';
    $catalog = mysqli_query($atmostfera_db, $push);
?>

<div class="row catalog">
<?php
while ($product = mysqli_fetch_array($catalog)) {
?>
    <div class="col-sm-4">
    <a href="product?id=<?php echo $product['id_sphere']; ?>">
        <div class="card tovar">
            <img src="<?php
                    $push = 'SELECT * FROM sphere_img JOIN img_product ON sphere_img.id_img_fk = img_product.id_img WHERE sphere_img.id_sphere_fk = '.$product['id_sphere'].' limit 1';
                    $img = mysqli_query($atmostfera_db, $push);
                    $img_product = mysqli_fetch_array($img);
                    echo $img_product['ucr_img'];
            ?>">
            <h5> <?php echo $product['name_sphere']; ?></h5>
            <p> Цена за сутки: <?php if($product['aprice_sphere'] == 0){echo $product['price_sphere'];}else{ echo $product['aprice_sphere']; ?> <s><?php echo $product['price_sphere'];} ?></s></p>
        </div>        </a>    
    </div>
<?php
}
?>
</div>
