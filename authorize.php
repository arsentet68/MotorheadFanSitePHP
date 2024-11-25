<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Фан-сайт Motörhead</title>
        <link rel="stylesheet" type = "text/css" href="css/stylesheet.css">
        <script src="js/js.js"></script>
        <?php include 'connection.php'?>
   </head>
<body>
    <div class="topnav">
        <div class="drop">
            <button class="but-nav">&#9776</button>
            <div class="topnav-list">
                <a href="index.php">Главная</a>
                <a href="news.php">Новости</a>
                <a href="catalogue.php">Каталог</a>
                <a href="contacts.php">Контакты</a>
                <div class="rightside">
                    <a id="clock">00:00:00</a>
                    <a class="active" href="authorize.php">Авторизация</a>
                </div>
            </div>
        </div>
    </div>
    <h1>Авторизация</h1>
    <div class="container">
        <form class="auth-form" method="post" action="validate.php" name="auth-form">
            <div class="text-field">
                <label class="text-field_label" for="login_input">Логин</label><br>
                <input value="lemmy" class="text-field_input" type="text" name="login" id="login_input" required /><br>
                <label class="text-field_label" for="password_input">Пароль</label><br>
                <input value="kilmister" class="text-field_input" type="password" name="password" id="password_input" required><br>
                <button type=submit class="auth-button" name="login_button" value="login123">Войти</button>
                <?php if(isset($_GET['error'])) echo"Неверные данные для входа!";?>
            </div>
        </form>
    </div>
</body>
</html>