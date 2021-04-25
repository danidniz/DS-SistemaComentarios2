<?php
//conexão
require 'connection.php';
//sessão
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
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">

    <div class="row">
        <div class="col s12 m6 push-m3 ">
            <h1>Bem-Vindo <?php echo $dados['name']; ?></h1>
            <h3 class="light">Comentários</h3>
            <div class="row">
                <form action="create_comentario.php" method="post" class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="comentario" id="comentario" class="materialize-textarea"></textarea>
                            <label for="textarea1">Digite seu comentário</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="btn-enviar">Enviar<i class="material-icons right">send</i></button>
                </form>
            </div>
            <br>
            
        </div>
    </div>
    <a class="btn waves-effect waves-light" href="logout.php">Sair</a>
    <a class="btn waves-effect waves-light" href="cadastro.php">Criar Login</a>

</div>


<div class="row d-flex justify-content-center mt-100 mb-100">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">Latest Comments</h4>
            </div>
            <div class="comment-widgets">
                <!-- Comment Row -->


                <?php
                    $sql = "SELECT * from post ORDER BY id DESC";
                    $resultado = mysqli_query($connect,$sql);
                    mysqli_close($connect);
                    if(mysqli_num_rows($resultado) > 0):
                        
                    while($dados = mysqli_fetch_array($resultado)):
                ?>


                <div class="d-flex flex-row comment-row m-t-0">
                    <div class="p-2"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583336/AAA/4.jpg" alt="user" width="50" class="rounded-circle"></div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium ml-2"><?php echo $dados['post_nome']; ?></h6> 
                        <span class="m-b-15 mb-2 ml-2 d-block"><?php echo $dados['post']; ?></span>
                        <div class="comment-footer mb-5 ml-2 mr-3"> 
                            <span class="text-muted float-right"><?php echo $dados['post_data']; ?></span> 
                            <a href="editar.php?id=<?php echo $dados['id']; ?>" role="button" class="btn btn-cyan btn-sm btn-primary">Editar</a>
                            <a href="excluir.php?id=<?php echo $dados['id']; ?>" role="button" class="btn btn-danger btn-sm">Deletar</a> 
                        </div>
                    </div>
                </div> 
              
              <?php 
                endwhile;
                endif; 
            ?>
            </div> <!-- Card -->
        </div>
    </div>
</div> 



    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>