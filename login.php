<?php
include 'sql.php';
// define variables and set to empty values
$accountErr = $passwordErr = "";
$account = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["account"])) {
    $accountErr = "Account is required";
  } 

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  }   
}
?>

<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>This is a Heading</h1>

<form action="./login.php" method="post">
    Account:<br>
    <input type="text" name="account">
    <br><br>
    Password:<br>
    <input type="password" name="password">
    <br><br>
    <input type="submit" value="Login">
    <br><br>
<?php
    echo $accountErr . '<br>';
    echo $passwordErr;
?>
</form>

</body>
</html>

