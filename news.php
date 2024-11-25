<!DOCTYPE html>
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
                    <a href="index.php">Главная</a>
                    <a class="active" href="news.php">Новости</a>
                    <a href="catalogue.php">Каталог</a>
                    <a href="contacts.php">Контакты</a>
                    <div class="rightside">
                        <a id="clock">00:00:00</a>
                        <a class="auth" href="authorize.php">Авторизация</a>
                    </div>
                </div>
            </div>
        </div>
        <h1>Новости</h1>
        <div class="newsgroup">
            <?php
                $sql = "SELECT * FROM NEWS ORDER BY DATE DESC";
                if ($result = $connection->query($sql))
                {
                    $rowsCount = $result->num_rows; //количество полученных строк
                    foreach ($result as $row){
                        $orgDate = $row["date"];
                        $newDate = date("d.m.Y", strtotime($orgDate));
                        echo "<article class=\"news\">
                                <img src=\"$row[image]\">
                                <h2>$row[title]</h2>
                                <p>$row[text]</p>
                                <label>$newDate</label>
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
    </body>
</html>