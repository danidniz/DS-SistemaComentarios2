<?php
//Conexão
require 'connection.php';
//sessão
session_start();



if(isset($_POST['btn-deletar'])){
    $id = mysqli_escape_string($connect, $_POST['id']);
        
    $sql = "delete from post where id = '$id'";
    
    if(mysqli_query($connect, $sql)){
        
       header('Location: home.php');
    }
    else{
        header('Location: index.php');
    }
}
