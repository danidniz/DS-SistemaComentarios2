<?php
//sessão
session_start();
//Conexão
require 'connection.php';

if(isset($_POST['btn-criar-usuario'])):
    $name = mysqli_escape_string($connect, $_POST['nome']);
    $username = mysqli_escape_string($connect, $_POST['usuario']);
    $password = mysqli_escape_string($connect, $_POST['senha']);
    $avatar = mysqli_escape_string($connect, $_FILES['avatar']['name']);
    $extensao = strtolower(pathinfo($avatar, PATHINFO_EXTENSION));
    $photo = md5(time()).".".$extensao;
    $diretorio = "img/";


    move_uploaded_file($_FILES['avatar']['tmp_name'], $diretorio . $photo);
        
    
        $sql = "insert into usuarios (name, password, username, imagem) values ('$name', '$password', '$username', '$photo')";

        if(mysqli_query($connect, $sql)):
        header('Location: index.php');
        else:
        header('Location: cadastro.php');
        endif;

        endif;

    
