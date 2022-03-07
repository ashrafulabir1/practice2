<?php
$name=$_POST['name'];
$password=$_POST['password'];
$email=$_POST['email'];

if(!empty($name)|| !empty($password) || !empty($email)){
    $host ="localhost";
    $dbUsername="root";
    $dbPassword=" ";
    $dbname="practice";
    $conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_error().')' .mysqli_connect_error());
}


else{
$SELECT="SELECT email From register Where email=? Limit 1";
$INSERT= "INSERT Into Register (name,password,email)values(?,?,?)";
$stmt=$conn->prepare($SELECT);
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum =$stmt->num_rows;

if($rnum==0){
    $stmt->close();
    $stmt =$conn->prepare($INSERT);
    $stmt->bind_param("sss",$name,$password,$email);
    $stmt ->execute();
    echo "New Record has been recorded successfully";

}
else{
    echo "Someone Already registered with this email.";
}
$stmt ->close();
$conn->close();

}
} else{
    echo "All field are required";
    die();

}

   

/*
$conn=new mysqli('localhost','root','','practice');
if($conn->connect_error){
    die('Connection Failled'.$conn->connect_error);

}else{
    $stmt =$conn->prepare("insert into regestration(name,password,email)values(?,?,?)");
$atmt->bind_param("sss",$name, $password, $email);
$stmt->execute();
echo "Regestration Successfully..";
$stmt->close();
$conn-> close();
}
*/
