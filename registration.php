<?php

//подключение к БД task5 с таблицей зарегистрированных пользователей users через phpMyAdmin
$dbc = mysqli_connect('localhost', 'root', '', 'task5');

//проверка существования POST-запроса на добавление нового пользователя в базу данных
// if (isset($_POST['submit'])) {
//   echo "Yes";
// }
// else {
//   echo "No";
// }

//запрос на добавление данных в базу данных phpMyAdmin
if (isset($_POST['submit'])) {
  $login = mysqli_real_escape_string($dbc, trim($_POST['login']));
  $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
  
  if (!empty($login) && !empty($password)) {
    $query = "SELECT *
    FROM `users`
    WHERE login = '$login'";
    $data = mysqli_query($dbc, $query);
    
    if (mysqli_num_rows($data) == 0) {
      $query = "INSERT INTO `users` (login, password)
      VALUES ('$login', '$password')";
      mysqli_query($dbc, $query);
      echo "Все готово, можете авторизоваться.";
      mysqli_close($dbc);
      exit();
    }
    else {
      echo '<p style="color:red;"><b>Такой логин уже существует.</b></p>';
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Задание 5 (форма регистрации и подключение к БД)</title>
  <link rel="stylesheet" href="style.css">
</head>
<body id = "registration_page">

  <h1>Страница регистрации новых пользователей</h1>
  
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="login">Введите ваш логин:</label>
    <input type="text" name="login"><br>
    <label for="password">Придумайте пароль:</label>
    <input type="password" name="password"><br>
    <button name="submit" type="submit">Зарегистрироваться!</button>
  </form>

  <div class="links">
    <a href="index.php">На главную</a>
  </div>


</body>
</html>