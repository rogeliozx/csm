<?php 

session_start();

$mysqli=new mysqli('localhost','root','','cms' ) or die(mysqli_error($mysqli));
$id=0;
$name='';
$location='';
$update=true;


if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM users WHERE user_id=$id")or die($mysqli->error());
    $_SESSION['message']="Datos fueron Borrados";
$_SESSION['msg_type']="danger";
header("location: delete.php");
}

if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM users WHERE  user_id=$id") or die($mysqli->error());
    
        $row=$result->fetch_array();
       $name=$row['user_name'];
       $location=$row['user_password'];
    
}
if(isset($_POST['update'])){
    $user_id=$_POST['id'];
    $user_name=$_POST['name'];
    $user_password=$_POST['location'];

  
  $mysqli->query("UPDATE users SET user_name='$user_name',user_password='$user_password' WHERE user_id=$user_id ") or die($mysqli->error());
  $_SESSION['message']="Datos fueron actualizados!";
 $_SESSION['msg_type']="warning";
 header("location: delete.php");
}
?>