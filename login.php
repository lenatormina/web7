<?php

header('Content-Type: text/html; charset=UTF-8');

session_start();

if (!empty($_SESSION['login'])) {
  session_destroy();
 
  header('Location: ./');
}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $errors = array();
  $errors['login'] = !empty($_COOKIE['login_error']);
   if ($errors['login']) {
    // Удаляем куку, указывая время устаревания в прошлом.
    setcookie('login_error', '', 100000);
    // Выводим сообщение.
    printf('Неверный логин и пароль. Попробуйте снова.');
   }
?>
<form action="" method="post">
  <input name="login" />
  <input name="pass" />
  <input type="submit" value="Войти" />
</form>
<?php 
}

else {

  // TODO: Проверть есть ли такой логин и пароль в базе данных.
  // Выдать сообщение об ошибках.
  $errors = FALSE;
  
  $user = 'u41181';
  $password = '2342349';
  $db = new PDO('mysql:host=localhost;dbname=u41181', $user, $password, array(PDO::ATTR_PERSISTENT => true));
  
  $login = $_POST['login'];
  $pass = md5($_POST['pass']);
  $stmt = $db->prepare("SELECT * FROM form2 WHERE login = '$login' && passwordmd = '$pass'");
  $stmt->execute();
  $count = 0;
  foreach ($stmt as $row) {
    $count = 1;
  }

  if ($count)
  {
    // Если все ок, то авторизуем пользователя.
    $_SESSION['login'] = $_POST['login'];
    // Записываем ID пользователя.
    $_SESSION['uid'] = 123;
    // Делаем перенаправление.
    header('Location: ./');
  }
  else
  {
    setcookie('login_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  if ($errors) {
    
    header('Location: login.php');
    exit();
  }
}
