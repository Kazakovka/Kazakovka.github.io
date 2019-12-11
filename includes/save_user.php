<html>
    <head>
    <title>Регистрация</title>
	<meta charset="utf-8" />
    </head>
<?php
    setlocale(LC_ALL, 'ru_RU.65001', 'rus_RUS.65001', 'Russian_Russia.65001', 'russian');
    if (isset($_POST['login'])) { $USERNAME = $_POST['login']; if ($USERNAME == '') { unset($USERNAME);} } //заносим введенный пользователем логин в переменную $USERNAME, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $PASSKEY=$_POST['password']; if ($PASSKEY =='') { unset($PASSKEY);} } //заносим введенный пользователем пароль в переменную $PASSKEY, если он пустой, то уничтожаем переменную
	if (isset($_POST['firstname'])) { $FIRSTNAME=$_POST['firstname']; if ($FIRSTNAME =='') { unset($FIRSTNAME);} }
	if (isset($_POST['lastname'])) { $LASTNAME=$_POST['lastname']; if ($LASTNAME =='') { unset($LASTNAME);} }
	if (isset($_POST['secondname'])) { $SECONDNAME=$_POST['secondname']; if ($SECONDNAME =='') { unset($SECONDNAME);} }
	if (isset($_POST['yearofbirth'])) { $YEARBIRTH=$_POST['yearofbirth']; if ($YEARBIRTH =='') { unset($YEARBIRTH);} }
	if (isset($_POST['list'])) { $SEX=$_POST['list']; if ($SEX =='') { unset($SEX);} }
    if((empty($USERNAME) or empty($PASSKEY)) or (empty($FIRSTNAME)) or (empty($LASTNAME)) or (empty($SECONDNAME)) or (empty($YEARBIRTH))) //если пользователь не ввел данные, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $USERNAME = stripslashes($USERNAME);
    $USERNAME = htmlspecialchars($USERNAME);
    $PASSKEY = stripslashes($PASSKEY);
    $PASSKEY = htmlspecialchars($PASSKEY);
	$FIRSTNAME = stripslashes($FIRSTNAME);
    $FIRSTNAME = htmlspecialchars($FIRSTNAME);
	$LASTNAME = stripslashes($LASTNAME);
    $LASTNAME = htmlspecialchars($LASTNAME);
	$SECONDNAME = stripslashes($SECONDNAME);
    $SECONDNAME = htmlspecialchars($SECONDNAME);
	$YEARBIRTH = stripslashes($YEARBIRTH);
    $YEARBIRTH = htmlspecialchars($YEARBIRTH);
 //удаляем лишние пробелы
    $USERNAME = trim($USERNAME);
    $PASSKEY = trim($PASSKEY);
	$FIRSTNAME = trim($FIRSTNAME);
    $LASTNAME = trim($LASTNAME);
	$SECONDNAME = trim($SECONDNAME);
    $YEARBIRTH = trim($YEARBIRTH);
 // подключаемся к базе
    include ("db.php");// файл db.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
	$conn = db_connect_shop();
 // проверка на существование пользователя с таким же логином
    $sql = 'SELECT USERNAME FROM shop_regusers WHERE USERNAME="'.$USERNAME.'"';
    $result = mysqli_query($conn, $sql);
    $myrow = mysqli_fetch_assoc($result);
    if (!empty($myrow['USERNAME'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
	$sql = "INSERT INTO shop_regusers (USERNAME,PASSKEY,FIRSTNAME,LASTNAME,SECONDNAME,YEARBIRTH,SEX) 
	VALUES('$USERNAME','$PASSKEY','$FIRSTNAME','$LASTNAME','$SECONDNAME','$YEARBIRTH','$SEX')";
 // если такого нет, то сохраняем данные
    $result2 = mysqli_query($conn, $sql);
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='..\index.php'>Главная страница</a>";
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
    ?>
</html>