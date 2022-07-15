<?php

$username = $_POST['username'];
$email  = $_POST['email'];
$password = $_POST['password'];
$balance = $_POST['balance'];




if (!empty($username) || !empty($email) || !empty($password) || !empty($balance) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bankuser";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $dbbalance );

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From users Where email = ? Limit 1";
  $INSERT = "INSERT Into users (name , email ,password, balance )values(?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
	 
	 $insert = "INSERT INTO users (name, email, password, balance ) VALUES('$username','$email','$password','$balance')";
         mysqli_query($conn, $insert);
         header('location:login.php');
		 
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>