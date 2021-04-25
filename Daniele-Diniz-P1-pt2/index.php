<?php
//conexão
require 'connection.php';
//sessão
session_start();

//botão enviar
    if(isset($_POST['btn-entrar'])):
        $erros = array();
        $login = mysqli_real_escape_string($connect, $_POST['login']);
        $senha = mysqli_real_escape_string($connect, $_POST['senha']);
        
        if(empty($login) or empty($senha)):
            $erros[] = "<font color='red'><i> ATENÇÃO: Usuário ou senha inválidos! </i>";
        else:
            $sql = "select id, username, password from usuarios where username = '$login' and password = '$senha'";
            $resultado = mysqli_query($connect,$sql);
            if(mysqli_num_rows($resultado) >0 ):
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($connect);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                header('Location: home.php');
            else:
                $erros[] = "<i> ATENÇÃO: Usuário ou senha inválidos! <i>";
            endif;
        endif;
    endif;
       
        ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>


    <div class="registration-form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
			<div class="form-group">
                <input type="text" name="login" class="form-control item" placeholder="Digite seu username">
            </div>
            <div class="form-group">
                <input type="password" name="senha" class="form-control item" placeholder="Digite sua senha">
            </div>

            <div class="warning">
                <?php 
                if(!empty($erros)):
                    foreach($erros as $erro):
            echo $erro;
                endforeach;
            endif; 
                ?>
            </div>

            <div class="form-group">
                <button type="submit" name="btn-entrar" class="btn btn-block create-account">Entrar</button>
            </div> 
			<div class="form-group">
				<a class="btn btn-block" href="cadastro.php" role="button">Cadastrar-me agora</a>
			</div> 
            <div class="form-group">
				<a class="btn btn-block" href="anonimo.php" role="button">Modo anônimo</a>
			</div>    
            <div class="container">
    
            
        </form> 
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>
