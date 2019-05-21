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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Cms</title>
</head>
<body>
    <div class="container">
    <a class="text-primary para" href="index.php" id="logo">CMS</a>

    <ol>
        <?php foreach($articles as $article){

        
        ?>
        <li><a class="tags" href="article.php?id=<?php echo $article['article_id'] ;?>">
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
        <small><a  class="w3-btn w3-ripple w3-blue" href="admin">admin</a> </small>
    <div>
</body>
</html>