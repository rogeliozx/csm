<?php
session_start();
include_once('../includes/Conection.php');

if (isset($_SESSION['logged_in'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
       
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="container.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Cms</title>
    </head>

    <body>
        <div class="container d-flex flex-column center ">
          <div class="p-2">
           <a class="text-primary" href="../index.php" id="logo">CMS</a>
           </div>
            <br /> 
            <div class="p-2">
            <ol class=" d-flex flex-column">
                <li><a class="btn btn-info p-2 separa" href="add.php">Agregar</a></li>
                <li><a class="btn btn-danger p-2 separa" href="delete.php">Borrar  Editar Articulo</a></li>
                <li><a class="w3-button w3-green p-2" href="users.php">Manejo usuarios</a></li>
            </ol>
            </div>
           
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
            $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password=?");
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