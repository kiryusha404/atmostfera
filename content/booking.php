<?php
    $id_product = $_GET['id'];
    $push = 'SELECT * FROM sphere where id_sphere = '.$id_product.'';
    $name = mysqli_query($atmostfera_db, $push);
    $row = mysqli_fetch_array($name);
?>
<div class="author">
<h1 class="center">Бронирование <?php echo $row['name_sphere']; ?></h1>
<form action="" method="post" class="form_input">

        <input type="tel" required name="people" placeholder="Количество человек"> 
        <p>Дата заезда с </p>
        <input type="date" required name="date1" > 
        <p>по </p>
        <input type="date" required name="date2" > 
        <?php
        function valid($people, $cpeople, $date1, $date2, $date){

            if($people > $cpeople){
                echo "<p class='error'>Нельзя написать больше пользователей, чем может поместиться.</p>";
                return 0;
            }

            if(strtotime($date1) > strtotime($date2)){
                echo "<p class='error'>Дата выезда меньше, чем дата заезда.</p>";
                return 0;
            }

            if(strtotime($date1) <= strtotime($date)){
                echo "<p class='error'>В эти дни уже забранированно, посмотри в описании товара, когда можно забранировать.</p>";
                return 0;
            }

            return 1;

        }
        $currentDate = date('Y-m-d');
        $push = 'SELECT * FROM `booking`WHERE id_sphere_fk = '.$id_product.' ORDER BY date2 DESC LIMIT 1';
        $tovar = mysqli_query($atmostfera_db, $push);
        $tovar_p = mysqli_fetch_array($tovar);  
        $date1 = date("y-m-d", strtotime($tovar_p['date2'].'+ 1 days')); 
            if(valid($_POST['people'], $row['capacity_sphere'], $_POST['date1'], $_POST['date2'], $date1) == 1){
                $date1 = date("20y-m-d", strtotime($_POST['date2'].'+ 1 days')); 
                $push = 'INSERT INTO `booking` (`id_booking`, `id_user_fk`, `id_sphere_fk`, `date1`, `date2`, `status_booking`, `people`, `time`) VALUES (NULL, '.$_SESSION['id_us'].', '.$id_product.', "'.$_POST['date1'].'", "'.$date1.'", "new", '.$_POST['people'].', "'.$currentDate.'");';
                $tovar = mysqli_query($atmostfera_db, $push);
                echo "<script>window.location.href='order'</script>";
            }
        ?>
        <button type="submit" class="info_input info_input_button">Забронировать</button>

    </form>
</div>