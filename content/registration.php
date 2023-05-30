<div class="author">
    <h1 class="center">Регестрация</h1>
<form action="" method="post" class="form_input">

        <input type="text" tabindex="1" required name="name" class="info_input" placeholder="Имя" value="<?php echo $_POST['name'] ?>">
        <input type="text" tabindex="2" required name="surname" class="info_input" placeholder="Фамилия" value="<?php echo $_POST['surname'] ?>"> 
        <input type="text" tabindex="3" name="patronymic" class="info_input" placeholder="Отчество" value="<?php echo $_POST['patronymic'] ?>">
        <input type="text" tabindex="4" required name="login" class="info_input" placeholder="Логин" value="<?php echo $_POST['login'] ?>">
        <input type="text" tabindex="5" required name="email" class="info_input" placeholder="Емаил" value="<?php echo $_POST['email'] ?>">
        <div class="password">
	        <input type="password" tabindex="6" id="password-input2" required placeholder="Пароль" name="pass" class="info_input" >
	        <a href="#" class="password-control" onclick="return show_hide_password(this, 'password-input2');"></a>
        </div>
        <div class="password">
	        <input type="password" tabindex="7" id="password-input3" required placeholder="Повторите пароль" name="pass2" class="info_input" >
	        <a href="#" class="password-control" onclick="return show_hide_password(this, 'password-input3');"></a>
        </div> 
        <div class="confirmation ">
            <input type="checkbox" required name="check" class="check" tabindex="8">
            <p>Я соглашаюсь с <a href="https://yandex.ru/legal/rules/" id="user_agreement">пользовательскими условиями</a></p>
        </div>     
        <?php  
        if($_POST['name'] && $_POST['surname'] && $_POST['login'] && $_POST['email'] && $_POST['pass'] && $_POST['pass2'] && $_POST['check']){
                function check($login_us, $email_us, $pass, $pass2)
                {
                    $atmostfera_db = mysqli_connect("localhost", "root", "root", "atmostfera");
                    $push = 'SELECT login_user, email_user FROM users WHERE login_user="'.$login_us.'" or email_user="'.$email_us.'"';
                    $login = mysqli_query($atmostfera_db, $push);
                    
                    while($row = mysqli_fetch_array($login)){

                    if($pass == $pass2){

                    }
                    else{
                        echo "<p class='error'>Пароли не совпадают.</p>";
                        return 0;
                    }        

                    if($row['login_user'] == $login_us){
                        echo "<p class='error'>Аккаунт с таким логином уже существует.</p>";
                        return 0;
                    }

                    if($row['email_user'] == $email_us){
                        echo "<p class='error'>Аккаунт с такой почтой уже существует.</p>";
                        return 0;
                    }

                    }

                    return 1;
                }

                if(check($_POST['login'], $_POST['email'], $_POST['pass'], $_POST['pass2']) == 1){
                    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                    $push = 'INSERT INTO `users` (`id_user`, `name_user`, `surname_user`, `patronymic_user`, `login_user`, `email_user`, `pass_user`, `role_user`) VALUES (NULL, "'.$_POST['name'].'", "'.$_POST['surname'].'", "'.$_POST['patronymic'].'", "'.$_POST['login'].'", "'.$_POST['email'].'", "'.$pass.'", "user");';
                    $completion = mysqli_query($atmostfera_db, $push);
                    echo $push;

                    $push = 'select * from users where login_user = "'.$_POST['login'].'"';
                    $data = mysqli_query($atmostfera_db, $push);
                    $row = mysqli_fetch_array($data);

                    $_SESSION['id_us'] = $row['id_user'];
                    $_SESSION['role_us'] = $row['role_user'];

                    echo "<script>window.location.href='index'</script>";
                }

            }    
        ?>
        <button type="submit" id="check" class="info_input info_input_button">Зарегистрироваться</button>

    </form>
    <p class="reg_text">У вас есть аккаунт? <a href="authorization">Войти</a></p>
</div>

<script src="js/equally_pass.js"></script>
<script src="js/pass.js"></script>