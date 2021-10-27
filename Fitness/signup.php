<?php

require 'database.php';

$mesasage= '';

if (!empty($_POST['email']) && !empty($_POST['password'])){
    $sql = "INSERT INTO user (email, password) VALUE (:email, :password)" ;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam('email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);


    if ($stmt->execute()){
        $message = 'Usuario registrado correctamente';
    } else{
        $message = 'No se pudo crear el usuario "A PURO PUTO NO SE LE CREA EL USUARIO"';
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


            <h1>Registrese</h1>
            <span>or<a href="login.php"></a> </span>

        <form method="POST" action="signup.php" name="signin-form">
            <div class="form-element">
                <label>Email</label>
                <input type="text" name="email" placeholder="Ingrese su correo" required>
            </div>
            <div class="form-element">
                <label>Contraseña</label>
                <input type="password" name="password" placeholder="Ingrese su contraseña"  required>
            </div>
            <div class="form-element">
                <label>Confirme la contraseña</label>
                <input type="password" name="password" placeholder="Ingrese su contraseña"  required>
            </div>
            <button type="submit" name="login" value="login">Ingresar</button>
        </form>
    </body>
</html>