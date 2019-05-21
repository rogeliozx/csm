<?php
session_start();
include_once('../includes/Conection.php');

if (isset($_SESSION['logged_in'])) {
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
            <ol>
                <li><a href="add.php">Add Article</a></li>
                <li><a href="delete.php">Delete Article</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ol>
          
           
            <div>
    </body>

    </html>

<?php
} else {
    if (isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username) or empty($password)) {
            $error = 'Se requiere todos los campos';
        } else {
            $query = $pdo->prepare("SELECT * FROM user WHERE user_name = ? AND user_password=?");
            $query->bindValue(1, $username);
            $query->bindValue(2, $password);

            $query->execute();
            $num = $query->rowCount();
            if ($num == 1) {
                $_SESSION['logged_in'] = true;
                header('Location:index.php');
                exit();
            } else {
                $error = 'Datos incorrectos';
            }
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
            <a class="para" href="index.php" id="logo">CMS</a>
            <br /> <br />
            <?php if (isset($error)) { ?>
                <small style="color:red;"><?php echo $error; ?></small>
                <br /><br />
            <?php  } ?>
            <form action="index.php" method="post" autocomplete="of">
                <input type="text" name="username" placeholder="Username" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" value="Login" />

            </form>
            <div>
    </body>

    </html>
<?php
}
?>