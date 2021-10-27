<?php

session_start();

if (isset($_SESSION['user_id'])){
    header('Location_: /Fitness');
}

require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])){
    $records = $conn->prepare('SELECT id, email, password FROM user WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $result = $records->fetch(PDO::FETCH_ASSOC);

    $mesasage ='';

    if (count($result) > 0 && password_verify($_POST['password'], $result['password'] )){
        $_SESSION['user_id'] = $result['id'] ;
        header("location: /Fitness") ;
    } else{
        $mesasage = 'No coinciden las credenciales "A PURO PUTO NO LE COINCIDEN LAS  CREDENCIALES"';
    }
    
}



?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>FITNESS</title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php require 'partials/header.php' ?>
        <?php if(!empty($message)): ?>
            <p><?=$message?></p>
            <?php endif; ?>


            <h1>Login</h1>
            <span>or<a href="signup.php"></a> </span>

        <form method="POST" action="login.php" name="signin-form">
            <div class="form-element">
                <label>Email</label>
                <input type="text" name="email" placeholder="Ingrese su correo" required>
            </div>
            <div class="form-element">
                <label>Contraseña</label>
                <input type="password" name="password" placeholder="Ingrese su contraseña"  required>
            </div>
            <button type="submit" name="login" value="login">Ingresar</button>
        </form>
    </body>
</html>