<?php
    $push = 'SELECT id_sphere, name_sphere, price_sphere, aprice_sphere FROM sphere';
    $interval = 1;
?>
<form action="#" method="post" class="catalog_form">
<p class="element_form">Найти с </p>
<input type="date" required name="date1" class="element_form">
<p class="element_form"> по </p>
<input type="date" required name="date2" class="element_form">
<button type="submit">Найти</button>
</form>

<div class="row catalog">
<?php
if($_POST['date1'] && $_POST['date2']){
    $push = 'SELECT * FROM `sphere` WHERE id_sphere not in (SELECT id_booking FROM booking where booking.date2 > DATE "'.$_POST['date1'].'")';
    $interval = (strtotime($_POST['date2']) - strtotime($_POST['date1'])) / 24 / 60 / 60;
    if($_POST['date1'] > $_POST['date2']){
        $push = "Select * from sphere where 1 < 0";
    }
}
$catalog = mysqli_query($atmostfera_db, $push);
while ($product = mysqli_fetch_array($catalog)) {
?>
    <div class="col-sm-4">
    <div class="card tovar">
    <a href="product?id=<?php echo $product['id_sphere']; ?>">
        <div class="card tovar_f">
            <img src="<?php
                    $push = 'SELECT * FROM sphere_img JOIN img_product ON sphere_img.id_img_fk = img_product.id_img WHERE sphere_img.id_sphere_fk = '.$product['id_sphere'].' limit 1';
                    $img = mysqli_query($atmostfera_db, $push);
                    $img_product = mysqli_fetch_array($img);
                    echo $img_product['ucr_img'];
            ?>">
            <h5> <?php echo $product['name_sphere']; ?></h5>
            <p> Цена за сутки: <?php if($product['aprice_sphere'] == 0){echo ($product['price_sphere'] * $interval);}else{ echo ($product['aprice_sphere'] * $interval); ?> <s><?php echo ($product['price_sphere'] * $interval);} ?></s></p>
        </div>        </a><button><?php if(!$_POST['date1'] && !$_POST['date2']){echo 'Проверить наличие';}else{echo 'Бронировать';}?></button>   </div> 
    </div>
<?php
}
?>
</div>
