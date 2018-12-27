<?php
class UserListDao{
    private $servername = "localhost:3306";
    private $dbname = "userlist";
    private $username = "root";
    private $password = "root";
    private $conn;
 
    function connect(){
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully <br>"; 
    }

    function close(){
        $this->conn->close();
     }

    function login(){
        $sql = "select password, position from UserList where account = '" . $_POST["account"] . "'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
         
        if($row["password"] == $_POST["password"]){
            if($row["position"] == 'Manager'){
                $this->conn->close();
                header("Location: http://localhost/homework/manager.php");
            } else {
                $this->conn->close();
                header("Location: http://localhost/homework/employee.php");
            }
            
        } else {
            echo "帳號或密碼輸入錯誤";
        }
     }

    function managerPage(){
        $sql = "SELECT * FROM userlist ORDER BY position DESC";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo " 身份: " . $row["position"]. " | 姓名: " . $row["name"]. " | 帳號: " . $row["account"]. " | 密碼: " . $row["password"]. " | 評分: " . $row["score"]. " | 總分: " . $row["total"]. " | 是否評分: " . $row["done"]. "<br>";
            }
        } else {
            echo "0 results";
        }     
     }

    function manage(){
        $sql = "INSERT INTO UserList (position, name, account, password) VALUES ('$_POST[position]', '$_POST[name]', '$_POST[account]', '$_POST[password]')";

        if ($this->conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }        
    }


}


?>