<!DOCTYPE HTML>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Atmostfera</title>

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

        <link rel="icon" href="img/main/icon_atmostfera.png" type="image/x-icon">
    </head>
    <body>
        <header>
            <img src="img/main/header.jpg" class="img_header">
        <div class="main_space">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid header_nav">
    <a class="navbar-brand" href="about_us"><img src="img/main/mini_logo.png" class="logo_header"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключатель навигации">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active link_header" aria-current="page" href="about_us">О нас</a>
        </li>
        <li class="nav-item">
          <a class="nav-link link_header" href="sphere">Аренда сферы</a>
        </li>
        <li class="nav-item">
          <a class="nav-link link_header" href="address">Где нас найти?</a>
        </li>
        <li class="nav-item">
        <?php if($_SESSION['id_us']){ 
            print '<a class="nav-link link_header" href="order">Бронирования</a>';
           } ?>
        </li>
        <li class="nav-item">
        <?php if(!$_SESSION['id_us']){ 
            print '<a class="nav-link link_header" href="authorization">Войти</a>';
           } else{ 
            print '<a class="nav-link link_header" href="logout">Выйти</a>';
           } ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
            </header>
