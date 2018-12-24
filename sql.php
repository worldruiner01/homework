<?php
class UserListDao{
   private $servername = "localhost:3306";
   private $dbname = "test";
   private $username = "root";
   private $password = "root";

    function connect(){
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        echo "Connected successfully";
    }
    
    function get($account){
        $sql = 'select password from UserList where account ='. $account;
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();
            return $row["password"] ;
            
        } else {
            return Null;
        } 
    }

    function close(){
        $conn->close();
    }
}
?>