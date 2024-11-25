<?php
session_start();
include_once('connection.php');
if (!isset($_SESSION["username"])) {
    header("Location: authorize.php");
    exit();
}


// Редактирование 
if (isset($_POST["edit_item"])) 
{
    $edit_item_id = $_POST["edit_item_id"];
    $edit_item_image = $_POST["edit_item_image"];
    $edit_item_name = $_POST["edit_item_name"];
    $edit_item_price = $_POST["edit_item_price"];
   
    $sqlec = "UPDATE ITEMS SET image = '$edit_item_image', image = '$edit_item_name' , price = '$edit_item_price'  WHERE id = '$edit_item_id'";
    if ($result = mysqli_query($connection, $sqlec)) {
        echo "Товар изменен!";
    } 
    else 
    {
        echo "Ошибка при редактировании" ;
    }
}

// Удаление
if (isset($_POST["del_item"])) {
    $delete_item_id = $_POST["del_item_id"];
    
    $sqldc = "DELETE FROM ITEMS WHERE id = '$delete_item_id'";
    if ($result = mysqli_query($connection, $sqldc)) 
    {
        echo "Товар удален!";
    } else {
        echo "Ошибка при удалении";
    }
}

// Добавление
if (isset($_POST["add_item"])) {
    $new_item_image = $_POST["new_item_image"];
    $new_item_name = $_POST["new_item_name"];
    $new_item_price = $_POST["new_item_price"];

    
    $sqlac = "INSERT INTO ITEMS (image, name, price) VALUES ('$new_item_image', '$new_item_name','$new_item_price')";
    if ($result = mysqli_query($connection, $sqlac)) 
    {
        echo "Новый товар успешно добавлен!";
    } 
    else {
        echo "Ошибка при добавлении" ;
    }
}

// Получить список новостей 
$sqles = "SELECT * FROM ITEMS";

// Запрос для получения всех новостей в форму редактирования
if (!(isset($_POST["item_id"]))) 
{
$first_result = mysqli_query($connection, $sqles);
$first_row = mysqli_fetch_row($first_result);
$selected_id = $first_row[0];
$selected_image = $first_row[1];
$selected_name = $first_row[2];
$selected_price = $first_row[3];
}

$result = mysqli_query($connection, $sqles);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["item_id"])) 
{
    // Получение выбранной новости
    $selected_id = $_POST["item_id"];

    // Запрос для получения данных выбранной новости
    $sql_selected = "SELECT * FROM ITEMS WHERE ID=$selected_id";
    $result_selected = mysqli_query($connection, $sql_selected);

    if ($result_selected->num_rows > 0) {
        // Вывод формы с текущими данными
        $row = mysqli_fetch_row($result_selected);
        $selected_image = $row[1];
        $selected_name = $row[2];
        $selected_price = $row[3];
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
                    <a href="news_edit.php">Редактировать новости</a>
                    <a class="acrive" href="catalogue_edit.php">Редактировать каталог</a>
                    <div class="rightside">
                        <a id="clock">00:00:00</a>
                        <a class="auth" href="logout.php">Выход</a>
                    </div>
                </div>
            </div>
</div>
<h1>Редактирование каталога</h1>
    <div class="container">
        <form method="POST" action="catalogue_edit.php">
                <h3  class="editing_title">Добавить товар</h3>
                <label class="text-field_label" for="new_item_image">Изображение:</label>
                <input class="text-field_input" type="text" name="new_item_image" id="new_item_image" required><br>
                <label class="text-field_label" for="new_item_name">Название:</label>
                <input class="text-field_input" type="text" name="new_item_name" id="new_item_name" required><br>
                <label class="text-field_label" for="new_item_price">Цена:</label>
                <input class="text-field_input" type="text" name="new_item_price" id="new_item_price" required><br>
                <button class="auth-button" type="submit" name="add_item">Добавить</button>
        </form>
        <form method="post" action="catalogue_edit.php">
            <h3 class = "editing_title">Редактировать товар</h3>
            <label for="item_id">Выберите товар:</label>
            <select name="item_id" onchange="this.form.submit()">
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
        <form method="post" action="catalogue_edit.php"> 
            <input type="hidden" name="edit_item_id" id="edit_item_id" value="<?php echo $selected_id; ?>" required><br> 
            <label class="text-field_label" for="edit_item_image">Изображение:</label>
            <input class="text-field_input" type="text" name="edit_item_image" id="edit_item_image" value="<?php echo $selected_image; ?>" required><br>
            <label class="text-field_label" for="edit_item_name">Название:</label>
            <input class="text-field_input"type="text" name="edit_item_name"  id="edit_item_name" value="<?php echo $selected_name; ?>" required><br>
            <label class="text-field_label" for="edit_item_price">Цена:</label>
            <input class="text-field_input"type="text" name="edit_item_price"  id="edit_item_price" value="<?php echo $selected_price; ?>" required><br>
            <button class="auth-button" type="submit" name="edit_item">Изменить</button>
        </form>
        <form method="POST" action="catalogue_edit.php">
            <h3  class = "editing_title">Удалить товар</h3>
            <label class="text-field_label">Выберите товар для удаления:</label>
                <select name="del_item_id" id="del_item_id">
                    <?php  
                    $sqldel = "SELECT ID FROM ITEMS";
                    $resultdel = mysqli_query($connection, $sqldel);
                    while ($row = mysqli_fetch_row($resultdel)){ 
                    ?>
                        <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
                    <?php } 
                    ?>
                </select><br>
                <button class="auth-button" type="submit" name="del_item">Удалить</button>
        </form>
    </div>
</body>
</html>
