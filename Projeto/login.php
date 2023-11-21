<?php
session_start();
include "db_conn.php";

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['uname']) && isset($_POST['password'])){

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if(empty($uname)) {
        header("Location: index.php?error=Usuário requerido!");
        exit();
    }
    else if (empty($pass)){
        header("Location: index.php?error=Por favor digite a senha");
        exit();
    }

    // Prevenir ataques de injeção SQL
    $uname = mysqli_real_escape_string($conn, $uname);
    $pass = mysqli_real_escape_string($conn, $pass);

    $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if($row['user_name'] === $uname && $row['password'] === $pass){
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            header("Location: paginaEstoque.php");
            exit();
        }
        else{
            header("Location: index.php?error=Usuário ou senha incorreta");
            exit();
        }
    } 
    else {
        header("Location: index.php?error=Usuário não encontrado ou senha incorreta");
        exit();
    }
} 
else {
    header("Location: index.php?error=Os dados de login não foram recebidos");
    exit();
}
