<?php
    $push = "select * from action where status_action = 'active'";
    $class = mysqli_query($atmostfera_db, $push);
?>
<div class="add_tovar_admin">
    <form action="#" method="post" enctype="multipart/form-data" class="tovar_add_form">
    <select name="class" class="tovar_add_element">
    <?php 
        while($row = mysqli_fetch_array($class)){
    ?>
     <option value="<?php echo $row['id_action']; ?>"><?php echo $row['name_action']; ?></option>
     <?php } ?>
   </select>
    <button type="submit" class="add_but">Удалить акцию</button>
    </form>
</div>
<div class="menu_admin">
                <a href="add_category"><div class="element_menu_admin"><p>+ Добавить акцию</p></div></a>
</div>
<?php 
    if($_POST['class']){
            $push = 'UPDATE `action` SET `status_action` = "passive" WHERE `action`.`id_action` = '.$_POST['class'].';';
            $input = mysqli_query($atmostfera_db, $push);

            echo "<script>window.location.href='sphere'</script>";
    }
?>