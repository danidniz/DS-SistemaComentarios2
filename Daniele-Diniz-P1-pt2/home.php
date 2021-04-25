<?php
//conexão
require 'connection.php';
//header
include'includes/header.php';
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

<div class="container">

    <div class="row">
        <div class="col s12 m6 push-m3 ">
            <h1>Bem-vindo(a) <?php echo $dados['name']; ?></h1>
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
            <?php
                    $sql = "SELECT * from post ORDER BY id DESC";
                    $resultado = mysqli_query($connect,$sql);
                    mysqli_close($connect);
                    if(mysqli_num_rows($resultado) > 0):
                        
                    while($dados = mysqli_fetch_array($resultado)):
                ?>
            <ul class="collection">
                <li class="collection-item avatar">
                    <img src="img/anonimo.png" alt="" class="circle">
                    <p class="title"><?php echo $dados['post_nome']; ?></p>
                    <p><?php echo $dados['post']; ?></p> 
                    <span class="text-muted float-left"><?php echo $dados['post_data']; ?></span> 
                </li>
                <div class="comment-footer mb-5 ml-5 mr-3">           
                            
                    <a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn btn-success" type="button">Atualizar</a> 
                    <a href="excluir.php?id=<?php echo $dados['id']; ?>" class="btn btn-danger" type="button">Deletar</a> 
                    
                </div>
                
            </ul>
            <?php 
                endwhile;
                endif; 
            ?>
        </div>
    </div>
    <a class="btn waves-effect waves-light" href="logout.php">Sair</a>
    <a class="btn waves-effect waves-light" href="cadastro.php">Criar Login</a>

</div>



<?php 
    include'includes/footer.php';
?>
