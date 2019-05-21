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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <title>Cms</title>
    </head>

    <body>
        <div class="container">
            <a class="para w3-btn w3-ripple w3-blue" href="index.php" id="logo">CMS</a>
            <h4 class="w3-text-blue"><?php echo $data['article_title'] ?>-<small>
                posted <?php echo date('l jS', $data['article_timestamp']) ?>
            </small> </h4>
           <p class="w3-center w3-myfont">
<?php 
echo $data['article_content']
?>

           </p>
           <a class="w3-btn w3-white w3-border w3-border-green w3-round-xlarge" href="index.php" >&larr; Back</a>
            <div>
    </body>

    </html>

<?php
} else {
    header('Location:index.php');
    exit();
}



?>