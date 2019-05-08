<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cтраница со списком зарегистрированных пользователей</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id = "users_page">
    
    <h1>Список зарегистрированных на сайте пользователей</h1>
    
</body>
</html>

<?php
    //подключение к БД
    $dbc = mysqli_connect('localhost', 'root', '', 'task5');

    //SQL-запрос на выдачу данных из БД
    $strSQL = "SELECT * FROM `users`";     
    $rs = mysqli_query($dbc, $strSQL);                          
    
    //создание таблицы, в которую циклом будут добавляться строки с номером и логином
    //зарегистрированных пользователей из БД
    $table = "<table border = 1; width = '600px'; align = center;>
                <tr>
                    <td><b>№ пользователя</b></td><td><b>Логин пользователя</b></td>
                </tr>";
    
    $k = 1;
    while ($row = mysqli_fetch_array($rs)) {
    if ($k % 2 === 0) $color = "#FFFFFF";
    else $color = "#C0C0C0"; 
    $k++;

    $table .= "<tr BGCOLOR = '$color'>";
    $table .= "<td>".$row['id']."</td>";
    $table .= "<td>".$row['login']."</td>";   
    $table .= "</tr>";
        }
    $table .= "</table>";
            echo $table;

    echo "<div class='links'>
        <a href='index.php'>На главную</a>
        </div>";
?>