<!__後端__>
<?php
include 'sql.php';
$userListDao = new UserListDao();
$userListDao->connect();
$userListDao->managerPage();

$Error = "";
$position = $name = $account = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["position"]) or empty($_POST["name"]) or empty($_POST["account"]) or empty($_POST["password"])) {
    $Error = "請完整填寫欄位";
  } else {
    $userListDao->manage();
  }
}
?>



<!__前端__>
<html>
<head>
<title>Manager Page</title>
</head>
<body>

<h3>新建資料</h3>

<form action="./manager.php" method="post">
    身份:<br> 
    <input type="checkbox" name= "position" value="Manager"> Manager
    <input type="checkbox" name= "position" value="Employee"> Employee
    <br><br>
    姓名:<br>
    <input type="text" name="name">
    <br><br>
    帳號:<br>
    <input type="text" name="account">
    <br><br>
    密碼:<br>
    <input type="password" name="password">
    <br><br>
    <input type="submit" value="新增">
    <br><br>
<?php
    echo $Error . '<br>';
?>
</form>

</body>
</html>