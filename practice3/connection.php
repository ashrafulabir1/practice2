<?php     

    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "javatpoint";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from login where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
           echo file_get_contents("C:/xampp/htdocs/practice3/pizza.html");
            //echo "<h1><center> Login successful </center></h1>";  
           // echo file_get_contents("http://127.0.0.1:5500/practice2");

        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  

