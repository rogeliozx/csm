<?php
include_once('includes/Conection.php');
include_once('includes/article.php');

$article = new Article;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $article->fetch_data($id);
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
            <h4><?php echo $data['article_title'] ?>-<small>
                posted <?php echo date('l jS', $data['article_timestamp']) ?>
            </small> </h4>
           <p>
<?php 
echo $data['article_content']
?>

           </p>
           <a href="index.php" >&larr; Back</a>
            <div>
    </body>

    </html>

<?php
} else {
    header('Location:index.php');
    exit();
}



?>