<?php

session_start();

require 'database.php';

if (isset($_SESSION['user_id'])){
    $records = $conn->prepare('SELECT id, email, password FROM user WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $result = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($result) > 0){
        $user = $result;
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siuuuu</title>
    <link href="css/estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php require 'partials/header.php'?>

    <?php if(!empty($user)):?>
        <br>Bienvenido <?  $user['email'];?>
        <br>Se a logueado correctamente en
        <a href="logout.php">Logout</a>

        <?php else:?>
            <h1>Por favor loguese o registrese</h1>
            <a href="login.php">Login</a>
            <a href="signup.php">Registrese</a>
        <?php endif; ?>
</body>
</html>