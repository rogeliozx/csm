<?php 

session_start();
include_once('../includes/Conection.php');
include_once('../includes/article.php');
$article=new Article;
if(isset($_SESSION['logged_in'])){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        print_r($id);
        $query=$pdo->prepare('DELETE FROM articles WHERE article_id=');
        $query->bindValue(1,$id);
        $query->execute();
        header('Location:delete.php');
    }
    $articles=$article->fetch_all();
?>
 <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="../styles.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cms</title>
    </head>

    <body>
        <div class="container">
            <a class="para" href="../index.php" id="logo">CMS</a>
            <br />   <br /> 
           <h4>Seleccione el articulo para borrar:</h4>
           <form action="delete.php" method="get" >
<select onchange="this.form.submit();">
<?php foreach($articles as $article) {?>
<option name="id" value="<?php echo $article['article_id'];?>">
<?php echo $article['article_title'];?>
</option>
<?php }?>
</select>

           </form>
           
            <div>
    </body>

    </html>
<?php }else{

}

?>