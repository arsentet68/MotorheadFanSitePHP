<?php
session_start();
include_once('connection.php');

if (!isset($_SESSION["username"])) {
    header("Location: authorize.php");
    exit();
}

if(isset($_GET['formsubmit'])) echo"<script>alert('Пароль изменён!');</script>";
if(isset($_GET['unformsubmit'])) echo"<script>alert('Ошибка!');</script>";
?>

<html lang="ru">
<head>
        <meta charset="UTF-8">
        <title>Новости</title>
        <link rel="stylesheet" href="css/stylesheet.css">
        <script src="js/js.js"></script>
        <?php include 'connection.php'?>
</head>
<body>
    <div class="topnav">
            <div class="drop">
                <button class="but-nav">&#9776</button>
                <div class="topnav-list">
                    <a class="active" href="administration.php">Изменить пароль</a>
                    <a href="news_edit.php">Редактировать новости</a>
                    <a href="catalogue_edit.php">Редактировать каталог</a>
                    <div class="rightside">
                        <a id="clock">00:00:00</a>
                        <a class="auth" href="logout.php">Выход</a>
                    </div>
                </div>
            </div>
    </div>
    <h1>Панель администрирования</h1>
        <div class="container">              
                <h2>Изменить пароль</h2>
            <form method="post" action="change_password.php" class="auth-form">
                <div class="text-field" id="change_password">
                    <label class="text-field_label" for="new_password1">Новый пароль:</label>
                    <input class="text-field_input" type="password" name="new_password" required><br>
                    <input class="auth-button" type="submit" value="Изменить пароль">
                </div>
            </form>

        </div>

      
</body>
</html>