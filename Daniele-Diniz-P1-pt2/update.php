<?php
//Conexão
require 'connection.php';
//sessão
session_start();



if(isset($_POST['btn-editar'])){
    $id = mysqli_escape_string($connect, $_POST['id']);
    $post = mysqli_escape_string($connect, $_POST['post']);
    
    $sql = "update post set post = '$post', post_data = NOW() where id = '$id'";
    
    if(mysqli_query($connect, $sql)){
        
       header('Location: home.php');
    }
    else{
        header('Location: index.php');
    }
}
