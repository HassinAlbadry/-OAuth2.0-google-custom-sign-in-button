<?php
require_once './database.php';
require_once './index.php';
$email = $_POST['email'];
$name=$_POST['name'];
$sql = "SELECT email FROM users WHERE email ='$email' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

  echo"<script>alert(Your email exist in our database.Please sign in)</script>";
  
}else{

  $sql = "INSERT INTO users (email,name) VALUES ('$email','$name')";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();


}





?>
