<!__後端__>
<?php
include 'sql.php';
$userListDao = new UserListDao();
$userListDao->connect();

// define variables and set to empty values
$Error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["account"]) or empty($_POST["password"])) {
    $Error = "帳號或密碼輸入錯誤";
  } else{
    $userListDao->login();
  }   
}
?>



<!__前端__>
<html>
<head>
<title>Login Page</title>
</head>
<body>

<h1>This is a Heading</h1>

<form action="./login.php" method="post">
    帳號:<br>
    <input type="text" name="account">
    <br><br>
    密碼:<br>
    <input type="password" name="password">
    <br><br>
    <input type="submit" value="登入">
    <br><br>
<?php
    echo $Error . '<br>';
?>
</form>

</body>
</html>