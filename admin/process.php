<?php 

session_start();

$mysqli=new mysqli('localhost','root','','cms' ) or die(mysqli_error($mysqli));
$id=0;
$name='';
$location='';
$update=true;


if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM articles WHERE article_id=$id")or die($mysqli->error());
    $_SESSION['message']="Datos fueron Borrados";
$_SESSION['msg_type']="danger";
header("location: delete.php");
}

if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM articles WHERE  article_id=$id") or die($mysqli->error());
    
        $row=$result->fetch_array();
       $name=$row['article_title'];
       $location=$row['article_content'];
    
}
if(isset($_POST['update'])){
    $article_id=$_POST['id'];
    $article_title=$_POST['name'];
    $article_content=$_POST['location'];

  
  $mysqli->query("UPDATE articles SET article_title='$article_title',article_content='$article_content' WHERE article_id=$article_id ") or die($mysqli->error());
  $_SESSION['message']="Datos fueron actualizados!";
 $_SESSION['msg_type']="warning";
 header("location: delete.php");
}
?>