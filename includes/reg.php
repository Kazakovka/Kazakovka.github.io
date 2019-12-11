<html>
    <head>
    <title>Регистрация</title>
	<meta charset="utf-8" />
    </head>
    <body>
    <h2>Регистрация</h2>
    <form action="save_user.php" method="post" accept-charset="utf-8">
    <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
<p>
    <label>Ваш логин:</label>
    <input name="login" type="text" size="15" maxlength="50">
    </p>
<!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
<p>
    <label>Ваш пароль:</label>
    <input name="password" type="password" size="15" maxlength="20">
    </p>
<!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** --> 
<p>
    <label>Фамилия:</label>
    <input name="lastname" type="text" size="15" maxlength="100">
    </p>
	
<p>
    <label>Имя:</label>
    <input name="firstname" type="text" size="15" maxlength="100">
    </p>

<p>
    <label>Отчество:</label>
    <input name="secondname" type="text" size="15" maxlength="100">
    </p>

<p>
    <label>Год рождения:</label>
    <input name="yearofbirth" type="text" size="4" maxlength="4">
    </p>
<p>
    <label>Пол:</label>
    <select name="list">
		<option value="0">Мужской</option>
		<option value="1">Женский</option>
	</select>
    </p>

<p>
    <input type="submit" name="submit" value="Зарегистрироваться">
	<input type="reset" name="reset" value="Сбросить">
<!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** --> 
</p></form>
<?php
$CurrentDate = date("Y.m.d");
echo '<br />Текущая дата: '.$CurrentDate;
?>
    </body>
    </html>