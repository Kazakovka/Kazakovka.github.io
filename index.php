
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="options/style.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Tomorrow&display=swap&subset=latin-ext" rel="stylesheet">
	<title>SHOP</title>
</head>
<body>

<header class="header">
	<div class="container">
		<div class="header__inner">
			<div class="logo"><img src="images/logo1.png" width="70" height="70" class="imglogo">MR. ROBOT</div>
			<nav class="nav">
				<a class="nav__link" href="select.html">Войти или зарегистрироваться</a>
				<a class="nav__link" href="#">Каталог товаров</a>
				<a class="nav__link" href="#">Корзина</a>
				<a class="nav__link" href="#">О компании</a>			
			</nav>
		</div>
	</div>
</header>

<div class="intro">
	<div class="container">
			
	</div>
</div>

<form action="testreg.php" method="post">

    <!--****  testreg.php - это адрес обработчика. То есть, после нажатия на кнопку  "Войти", данные из полей отправятся на страничку testreg.php методом  "post" ***** -->
 <p>
    <label>Ваш логин:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>


    <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
 
    <p>

    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>

    <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** --> 

    <p>
    <input type="submit" name="submit" value="Войти">

    <!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** --> 
<br>
 <!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** --> 
<a href="reg.php">Зарегистрироваться</a> 
    </p></form>
    <br>
 <?php
    // Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    // Если пусты, то мы не выводим ссылку
    echo "Вы вошли на сайт, как гость<br><a href='#'>Эта ссылка  доступна только зарегистрированным пользователям</a>";
    }
    else
    {

    // Если не пусты, то мы выводим ссылку
    echo "Вы вошли на сайт, как ".$_SESSION['login']."<br><a  href='http://tvpavlovsk.sk6.ru/'>Эта ссылка доступна только  зарегистрированным пользователям</a>";
    }
    
?>
</body>
</html>