<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Каталог</title>
    <link rel="stylesheet" href="css/stylesheet.css">
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
                <a class="active" href="catalogue.php">Каталог</a>
                <a href="contacts.php">Контакты</a>
                <div class="rightside">
                    <a id="clock">00:00:00</a>
                    <a class="auth" href="authorize.php">Авторизация</a>
                </div>
            </div>
        </div>
    </div>
    <h1>Каталог</h1>
    <p id="p1">Здесь вы можете купить атрибутику с изображением вашей любимой группы по самым низким ценам!</p>
    <hr>
    <div class="sort-and-catalogue">
        <div class="sort">
            <label id="label1">Сортировать по...</label>
            <hr>
            <div align="center">
                <label>названию</label>
                <br>
                <label>цене</label>
                <br>
                <label>дате</label>
            </div>
            <hr>
            <label id="label2">Категории</label>
            <hr>
            <label for="t-shirts" class="category-label">Одежда</label> <input type="checkbox" id="t-shirts" class="checkbox-right">
            <br>
            <label for="accesiories" class="category-label">Аксессуары</label> <input type="checkbox" id="accesiories" class="checkbox-right">
            <br>
            <label for="pins" class="category-label">Значки</label> <input type="checkbox" id="pins">
            <br>
            <label for="misc" class="category-label">Другое</label> <input type="checkbox" id="misc">
            <br>
            <div align="center">
                <input type="button" value="Поиск" class="custom-button">
            </div>
        </div>
        <div class="catalogue">
        <?php
                $sql = "SELECT * FROM ITEMS";
                if ($result = $connection->query($sql))
                {
                    $rowsCount = $result->num_rows; //количество полученных строк
                    foreach ($result as $row){
                        echo "<article class=\"card\">
                                <img src=\"$row[image]\">
                                <h2>$row[name]</h2>
                                <hr>
                                <p>$row[price] &#8381</p>
                            </article>";
                    }
                    $result->free();
                } 
                else
                {
                    echo "Ошибка: " . $connection->error;
                }
                $connection->close();
            ?>
        </div>
    </div>
</body>

</html>