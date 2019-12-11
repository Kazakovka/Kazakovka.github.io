<?php
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['login'])) { $USERNAME = $_POST['login']; if ($USERNAME == '') { unset($USERNAME);} } //заносим введенный пользователем логин в переменную $USERNAME, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $PASSKEY=$_POST['password']; if ($PASSKEY =='') { unset($PASSKEY);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($USERNAME) or empty($PASSKEY)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $USERNAME = stripslashes($USERNAME);
    $USERNAME = htmlspecialchars($USERNAME);
    $PASSKEY = stripslashes($PASSKEY);
    $PASSKEY = htmlspecialchars($PASSKEY);
//удаляем лишние пробелы
    $USERNAME = trim($USERNAME);
    $PASSKEY = trim($PASSKEY);
// подключаемся к базе
    include ("db.php");// файл db.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
    $conn = db_connect_shop();
	$sql = "SELECT * FROM shop_regusers WHERE USERNAME='$USERNAME'";
    $result = mysqli_query($conn,$sql); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysqli_fetch_assoc($result);
    if (empty($myrow['PASSKEY']))
    {
    //если пользователя с введенным логином не существует
    exit ("Извините, введённый вами login или пароль неверный.");
    }
    else {
    //если существует, то сверяем пароли
    if ($myrow['PASSKEY']==$PASSKEY) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['USERNAME']=$myrow['USERNAME']; 
    $_SESSION['USERID']=$myrow['USERID'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
    echo "Вы успешно вошли на сайт! <a href='index.php'>Главная страница</a>";
    }
 else {
    //если пароли не сошлись

    exit ("Извините, введённый вами login или пароль неверный.");
    }
    }
    ?>