<div class="author">
<h1 class="center">Авторезация</h1>
<form action="" method="post" class="form_input">

        <input type="tel" tabindex="1" required name="login" class="info_input" placeholder="Логин" value="<?php echo $_POST['login'] ?>"> 
        <div class="password">
	        <input type="password" tabindex="2" id="password-input1" required placeholder="Пароль" name="pass" class="info_input" >
	        <a href="#" class="password-control" onclick="return show_hide_password(this, 'password-input1');"></a>
        </div>
        <button type="submit" class="info_input info_input_button">Войти</button>

    </form>
    <?php 
        if($_POST['login'] && $_POST['pass']){
            $push = 'SELECT id_user, pass_user, role_user FROM users WHERE login_user ="'.$_POST["login"].'"';
            $input = mysqli_query($atmostfera_db, $push);
            $row = mysqli_fetch_array($input);
                if(password_verify($_POST['pass'], $row['pass_user'])){
                   $_SESSION['role_us'] = $row['role_user']; 
                   $_SESSION['id_us'] = $row['id_user'];
                   echo "<script>window.location.href='index'</script>";
                }
                else{
                    echo "<p class='error'>Неверный логин или пароль.</p>";
                }
        }
        ?>
    <p class="reg_text">У вас нет аккаунта? <a href="registration">Зарегистрироваться</a></p>
</div>
<script src="js/pass.js"></script>