<!DOCTYPE html>
<html>
<head>
        <title> Login </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body>
<div class="container">

    <form action="login.php" method="post">
        <h2>Bem vindo Administrador</h2>
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"> <?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label> Usuario </label>
        <input type="text" name="uname" placeholder="Insira seu nome de Usuario"> <br>
        <label> Senha </label>
        <input type="password" name="password" placeholder="Insira sua senha"> <br>
    

        <button type="submit">Entrar</button>
    </form>


    <div class="drops">
    <div class="drop drop-1"></div>
    <div class="drop drop-2"></div>
    <div class="drop drop-3"></div>
    <div class="drop drop-4"></div>
    <div class="drop drop-5"></div>
  </div>
</div>

<footer>

<h3>Gerenciamento de Estacionamento - Samuel Bueno - Vitor Hugo &copy; <h3>


</footer>
</body>
</html>

