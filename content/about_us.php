<div class="info_us">
    <img src="img/main/logo.png" alt="logo" class="info_element"><p class="info_element">Глэмпинг "Атмосфера" - Стильный, комфортный и недорогой вариант размещения на природе с удобствами.</p>
    <br>
    <p class="info_p">Глэмпинг "Атсмосфера" в Удмуртии – новый формат отдыха для этого региона. Это первый глэмпинг в Ижевске!
Стильные сферы с панорамными видами на бескрайнее снежное поле зимой и зеленое «море» из трав и цветов летом. 
Здесь приятно просыпаться в уютной постели и любоваться порхающими в синем небе птицами, а засыпать под яркие звезды!</p>
</div>
<?php
    $push = 'SELECT * FROM `action` where status_action = "active" limit 3';
    $action = mysqli_query($atmostfera_db, $push);
?>

<div id="carouselExampleCaptions" class="carousel slide acctions" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
  <?php
  $i = 1;
while ($product = mysqli_fetch_array($action)) {
?>
    <div class="carousel-item <?php if($i == 1){ echo 'active'; $i=0;} ?>">
      <img src="<?php echo $product['img_action']; ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><?php echo $product['name_action']; ?></h5>
        <p><?php echo $product['info_action']; ?></p>
      </div>
    </div>
    <?php } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Предыдущий</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Следующий</span>
  </button>
</div>
