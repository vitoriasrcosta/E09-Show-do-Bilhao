<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        if(isset($_POST['entrar'])){

                if(empty($_POST['usuario']) || empty($_POST['senha']) ){
                    echo "Insira dados válidos";
                }
                
                else{
                    if(isset($_POST['usuario']) && isset($_POST['senha'])){
                        $users = [];
                        $users = file_get_contents('users.json');
                        $usersDecodificado = json_decode($users, true);

                        foreach($usersDecodificado as $user){
                            if($user['usuario'] == $_POST['usuario'] && $user['senha'] == $_POST['senha']){
                               // session_start();
                                $_SESSION['usuario'] = $user['usuario'];
                                $_SESSION['senha'] = $user['senha'];
                                header('Location: /ShowDoBilhao/index.php');
                            }

                            else{
                                echo("Usuário ou senha inválidos");
                            }
                        }
                    }
                }
        }

        include "./login.php";
    }
    else{
        if(isset($_GET['logout'])){
            unset($_SESSION['usuario']);
            session_destroy();
            header("Location: /ShowDoBilhao/inicio.php");
        }
        include "./index.php";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>