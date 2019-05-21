<?php 
session_start();
include_once('../includes/Conection.php');

if(isset($_SESSION['logged_in'])){
    if(isset($_POST['title'],$_POST['content'])){
        $title=$_POST['title'];
        $content=nl2br($_POST['content']);
        $time=time();
        if(empty($title) or empty($content)){
            $error='Todos los campos son requeridos';
        }else{
            $query=$pdo->prepare("INSERT INTO articles (article_title,article_content,article_timestamp) VALUES (?,?,?)");
            $query->bindValue(1,$title);
            $query->bindValue(2,$content);
            $query->bindValue(3,time());
            $query->execute();
            header('Location: index.php');
        }
    }
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
            <br /> 
           <h4>Agrega articulo</h4>
           <?php if (isset($error)) { ?>
                <small style="color:red;"><?php echo $error; ?></small>
                <br /><br />
            <?php  } ?>

           <form action="add.php" method="post" autocomplete="off">
        <input type="text" name="title" placeholder="Titulo"><br/><br/>
        <textarea rows="15" cols="50" placeholder="Contenido" 
        name="content"></textarea><br/><br/>
        <input type="submit" value="Agregar Articulo"><br/><br/>
           </form>
            <div>
    </body>

    </html>
<?php }else{
    header('Location:index.php');
}

?>