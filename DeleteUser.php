<?php
$con=mysqli_connect('localhost','root','','Faaruuq');
$id = $_GET['id'];
$sqlistm = mysqli_query($con, "DELETE FROM users WHERE UserId = '$id'");
if(!$sqlistm){
    echo "Nothing deleted";
}
else {
    echo "Medicine Deleted";
    header("location: ListUsers.php");
}
?>