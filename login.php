<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Вход на сайт</title>
  <link rel="stylesheet" href="style.css">
</head>
<body id = "login_page">
  <h1>Страница входа на сайт</h1>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="login">Введите ваш логин:</label>
    <input type="text" name="login"><br>
    <label for="password">Введите ваш пароль:</label>
    <input type="password" name="password"><br>
    <button name="submit" type="submit">Войти!</button>
  </form>
  <br><br>

  <a href="index.php">На главную</a><br>
  <?php

  $dbc = mysqli_connect('localhost', 'root', '', 'task5');

  if (isset($_POST['submit'])) {
  $login = mysqli_real_escape_string($dbc, trim($_POST['login']));
  $password = mysqli_real_escape_string($dbc, trim($_POST['password']));

  if (empty($login) || empty($password)) {
    echo "<script>
    alert('Не заполнены логин и/или пароль');
    </script>";
  } else {
    $query = ("SELECT password
    FROM `users`
    WHERE login = '$login'");
    $res =  mysqli_query($dbc, $query);
    $row = mysqli_fetch_row($res);
    if ($row[0] !== $password) {
      echo "<script>
      alert('Проверьте правильность пароля');
      </script>";
    } else {
      echo "<script>
      alert('Вход на сайт прошел успешно');
      window.location.replace('index.php');
      </script>";
    }
  }
}
  ?>

</body>
</html>