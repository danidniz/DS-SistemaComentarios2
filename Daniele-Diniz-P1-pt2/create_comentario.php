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


if(isset($_POST['btn-enviar'])):
    $post = mysqli_escape_string($connect, $_POST['comentario']);
    $nome = $dados['name'];
    $sql = "insert into post (post, post_nome, post_data) values ('$post', '$nome', NOW())";
    if(mysqli_query($connect, $sql)):
        header('Location: home.php');
    else:
        header('Location: logout.php');
    endif;

endif;

?>