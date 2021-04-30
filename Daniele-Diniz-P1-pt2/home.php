<?php
//conexão iniciada
require 'connection.php';

//sessão iniciada
session_start();


if(!isset($_SESSION['logado'])):
    header("Location: index.php");
else:
    $id = $_SESSION['id_usuario'];
    $sql = "select * from usuarios where id = '$id'";
    $resultado = mysqli_query($connect,$sql);
    $dados = mysqli_fetch_array($resultado);


endif;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bem-vindo(a)</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<a class="btn waves-effect waves-light" href="logout.php">Sair</a>
<a class="btn waves-effect waves-light" href="cadastro.php">Criar Login</a>

<section class="content-item" id="comments">
    <div class="container">   
    	<div class="row">
            <div class="col-12">   
            <h1>Bem-vindo(a) <?php echo $dados['name']; ?></h1>
            <h3 class="light">Comentários</h3>
                <form action="create_comentario.php" method="post" class="col s12">
                    <div class="row">
                        <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                            <textarea class="form-control" name="comentario" id="comentario" placeholder="Digite sua mensagem" required=""></textarea>
                            <button type="submit" class="btn btn-primary pull-right" name="btn-enviar">Submit</button> 
                        </div>
                    </div>  
                </form>
                
                <!-- PHP  -->
                <?php
                    $sql = "SELECT * from post ORDER BY id DESC";
                    $resultado = mysqli_query($connect,$sql);
                    mysqli_close($connect);
                    if(mysqli_num_rows($resultado) > 0):
                        
                    while($dados = mysqli_fetch_array($resultado)):
                ?>
                
                
                <!-- COMENTÁRIO - START -->
                <div class="media">
                    <a class="pull-left" href="#"><img src="img/anonimo.png" alt="" class="circle"></a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $dados['post_nome']; ?></h4>
                        <p><?php echo $dados['post']; ?></p>
                        <ul class="list-unstyled list-inline media-detail pull-left">
                            <li><i class="fa fa-calendar"></i><?php echo $dados['post_data']; ?></li>
                        </ul>
                        <ul class="list-unstyled list-inline media-detail pull-right">
                            <a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn btn-success" type="button">Atualizar</a> 
                            <a href="excluir.php?id=<?php echo $dados['id']; ?>" class="btn btn-danger" type="button">Deletar</a> 
                        </ul>
                    </div>
                </div>
                <!-- COMENTÁRIO FIM -->

            <?php 
                endwhile;
                endif; 
            ?>
            
            </div>
        </div>
    </div>
</section> 

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>