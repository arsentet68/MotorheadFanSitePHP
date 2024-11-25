<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Контакты</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <script src="js/js.js"></script>
</head>

<body>
    <div class="topnav">
        <div class="drop">
            <button class="but-nav">&#9776</button>
            <div class="topnav-list">
                <a href="index.php">Главная</a>
                <a href="news.php">Новости</a>
                <a href="catalogue.php">Каталог</a>
                <a class="active" href="contacts.php">Контакты</a>
                <div class="rightside">
                    <a id="clock">00:00:00</a>
                    <a class="auth" href="authorize.php">Авторизация</a>
                </div>
            </div>
        </div>
    </div>
    <h1>Контакты</h1>
    <div class="contacts-page">
        <div class="contacts">
            <div class="contact-names">
            <article>
                <p>Автор сайта: <font face="Schwabacher">Полынский Арсений</font><br>Электронная почта:
                    apolynskiy@mail.ru<br>Контактный
                    телефон: +7(911)123-45-67</p>
            </article>
            <article>
                <p>Специалист тех.поддержки: <font face="Schwabacher">Валиев Антон</font><br>Электронная почта:
                    avaliev@mail.ru<br>Контактный
                    телефон: +7(912)234-56-78</p>
            </article>
            <article>
                <p>Маркет-менеджер: <font face="Schwabacher">Гявгянен Артём</font><br>Электронная почта:
                    agyavgyanen@mail.ru<br>Контактный
                    телефон: +7(913)345-67-89</p>
            </article>
            <article>
                <p>Духовный наставник:<font face="Schwabacher"> Рогожников Даниил</font><br>Электронная почта:
                    drogozhnikov@mail.ru<br>Контактный
                    телефон: +7(914)456-78-90</p>
            </article>
            <article>
                <p>У него недавно был день рождения: <font face="Schwabacher">Кулаков Андрей</font><br>Электронная
                    почта: akulakov@mail.ru<br>Контактный
                    телефон: +7(915)567-89-01</p>
            </article>
            </div>
            <!-- <img src="images/imgonline-com-ua-Negativ-RKRqKXER8PxYwJ1.png"> -->
            <img src="images/motorhead.png">
        </div>
        <div class="feedback-form">
            <form>
                <h2>Оставьте нам обратную связь!</h2>
                <textarea placeholder="Что вы думаете о сайте?"></textarea>
                <hr>
                <h2>Оставьте нам свои контактные данные, если хотите</h2>
                <div class="user-contact-info">
                    <div>
                        <label for="name">Имя </label><br>
                        <label for="email">Электронная почта </label><br>
                        <label for="number">Контактный телефон </label>
                    </div>
                    <div>
                    <input type="text" id="name"><br>
                    <input type="text" id="email"><br>
                    <input type="text" id="number"><br>
                    </div>
                </div>
                <br>
                <input type="button" value="Отправить"></input>
            </form>
        </div>
    </div>
</body>

</html>