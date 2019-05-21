<?php 
include_once('includes/Conection.php');
include_once('includes/article.php');
$article=new Article;
$articles=$article->fetch_all();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cms</title>
</head>
<body>
    <div class="container">
    <a class="para" href="index.php" id="logo">CMS</a>

    <ol>
        <?php foreach($articles as $article){

        
        ?>
        <li><a href="article.php?id=<?php echo $article['article_id'] ;?>">
      <?php 
      echo $article['article_title'];
      ?>

        </a>
        -<small class="fecha">
          posted  <?php 
             echo date('l jS',$article['article_timestamp']);
            ?>
        </small>
    </li>
        <?php }?>
    </ol>
        <br/>
        <small><a href="admin">admin</a> </small>
    <div>
</body>
</html>