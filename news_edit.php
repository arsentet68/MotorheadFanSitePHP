<?php
session_start();
include_once('connection.php');
if (!isset($_SESSION["username"])) {
    header("Location: authorize.php");
    exit();
}


// Редактирование 
if (isset($_POST["edit_news"])) 
{
    $edit_news_id = $_POST["edit_news_id"];
    $edit_news_title = $_POST["edit_news_title"];
    $edit_news_image = $_POST["edit_news_image"];
    $edit_news_text = $_POST["edit_news_text"];
   
    $sqlec = "UPDATE `News` SET title = '$edit_news_title', image = '$edit_news_image' , text = '$edit_news_text'  WHERE id = '$edit_news_id'";
    if ($result = mysqli_query($connection, $sqlec)) {
        echo "Новость изменена!";
    } 
    else 
    {
        echo "Ошибка при редактировании" ;
    }
}

// Удаление
if (isset($_POST["del_news"])) {
    $del_news_id = $_POST["del_news_id"];
    
    $sqldc = "DELETE FROM `News` WHERE id = '$del_news_id'";
    if ($result = mysqli_query($connection, $sqldc)) 
    {
        echo "Новость удалена!";
    } else {
        echo "Ошибка при удалении";
    }
}

// Добавление
if (isset($_POST["add_news"])) {
    $new_news_title = $_POST["new_news_title"];
    $new_news_image = $_POST["new_news_image"];
    $new_news_text = $_POST["new_news_text"];

    
    $sqlac = "INSERT INTO `News` (title, image, text, date) VALUES ('$new_news_title', '$new_news_image','$new_news_text', NOW())";
    if ($result = mysqli_query($connection, $sqlac)) 
    {
        echo "Новая новость успешно добавлена!";
    } 
    else {
        echo "Ошибка при добавлении" ;
    }
}

// Получить список новостей 
$sqles = "SELECT * FROM `news`";

// Запрос для получения всех новостей в форму редактирования
if (!(isset($_POST["news_title"]))) 
{
$first_result = mysqli_query($connection, $sqles);
$first_row = mysqli_fetch_row($first_result);
$selected_id = $first_row[0];
$selected_title = $first_row[1];
$selected_image = $first_row[2];
$selected_text = $first_row[3];
}

$result = mysqli_query($connection, $sqles);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["news_id"])) 
{
    // Получение выбранной новости
    $selected_id = $_POST["news_id"];

    // Запрос для получения данных выбранной новости
    $sql_selected = "SELECT * FROM NEWS WHERE ID=$selected_id";
    $result_selected = mysqli_query($connection, $sql_selected);

    if ($result_selected->num_rows > 0) {
        // Вывод формы с текущими данными
        $row = mysqli_fetch_row($result_selected);
        $selected_title = $row[1];
        $selected_image = $row[2];
        $selected_text = $row[3];
    }

}
?>

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
                    <a href="administration.php">Изменить пароль</a>
                    <a class="active" href="news_edit.php">Редактировать новости</a>
                    <a href="catalogue_edit.php">Редактировать каталог</a>
                    <div class="rightside">
                        <a id="clock">00:00:00</a>
                        <a class="auth" href="logout.php">Выход</a>
                    </div>
                </div>
            </div>
</div>
<h1>Редактирование раздела "Новости"</h1>
    <div class="container">
        <form method="POST" action="news_edit.php">
                <h3  class="editing_title">Добавить новость</h3>
                <label class="text-field_label" for="new_news_title">Заголовок:</label>
                <input class="text-field_input" type="text" name="new_news_title" id="new_news_title" required><br>
                <label class="text-field_label" for="new_news_image">Изображение:</label>
                <input class="text-field_input" type="text" name="new_news_image" id="new_news_image" required><br>
                <label class="text-field_label" for="new_news_text">Текст:</label>
                <input class="text-field_input" type="text" name="new_news_text" id="new_news_text" required><br>
                <button class="auth-button" type="submit" name="add_news">Добавить</button>
        </form>
        <form method="post" action="news_edit.php">
            <h3 class = "editing_title">Редактировать новость</h3>
            <label for="news_id">Выберите новость:</label>
            <select name="news_id" onchange="this.form.submit()">
                <?php
                // Заполнение выпадающего списка
                while ($row = mysqli_fetch_row($result)) {
                    $id = $row[0];
                    echo "<option value=\"$id\" ";
                    echo ($selected_id == $id) ? "selected" : "";
                    echo ">$id</option>";
                }
            ?>
            </select>
        </form>
        <form method="post" action="news_edit.php"> 
            <input type="hidden" name="edit_news_id" id="edit_news_id" value="<?php echo $selected_id; ?>" required><br> 
            <label class="text-field_label" for="edit_news_title">Заголовок:</label>
            <input class="text-field_input" type="text" name="edit_news_title" id="edit_news_title" value="<?php echo $selected_title; ?>" required><br>
            <label class="text-field_label" for="edit_news_image">Изображение:</label>
            <input class="text-field_input" type="text" name="edit_news_image"  id="edit_news_image" value="<?php echo $selected_image; ?>" required><br>
            <label class="text-field_label" for="edit_news_text">Текст:</label>
            <input class="text-field_input" type="text" name="edit_news_text"  id="edit_news_text" value="<?php echo $selected_text; ?>" required><br>
            <button class="auth-button" type="submit" name="edit_news">Изменить</button>
        </form>
        <form method="POST" action="news_edit.php">
            <h3  class = "editing_title">Удалить новость</h3>
            <label class="text-field_label">Выберите новость для удаления:</label>
                <select name="del_news_id" id="del_news_id">
                    <?php  
                    $sqldel = "SELECT ID FROM `news`";
                    $resultdel = mysqli_query($connection, $sqldel);
                    while ($row = mysqli_fetch_row($resultdel)){ 
                    ?>
                        <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
                    <?php } 
                    ?>
                </select><br>
                <button class="auth-button" type="submit" name="del_news">Удалить</button>
        </form>
    </div>
</body>
</html>
