<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina</title>
    <link rel="stylesheet" href="estilo.css">
    
</head>
<main>
<body>
<div class="placa"></div>


<h1>Ola <?php echo $_SESSION['user_name']; ?> </h1>
<a  style='font-size:400%; left:74%; position:fixed; top:74%; z-index:1; font-family:"trafico"; color:black;' href = "logout.php"> Deslogar </a><div class="deslogar" ></div>
<ul>         

<li><a href="paginaEstoque.php" data-text="Pagina inicial">PAGINA INCIAL</a></li> 
<li><a href="registrarVeiculo.php" data-text="Registrar Veiculo">REGISTRAR VEICULO</a></li> 
<li><a href="consultarVeiculo.php" data-text="Consultar Veiculos">CONSULTAR VEICULOS</a></li> 
<li><a href="registrarSaida.php" data-text="Registrar Saida">REGISTRAR SAÍDA</a></li>                                
<li><a href="consultarSaidas.php" data-text="Consultar Saidas">CONSULTAR SAÍDAS</a></li> 

  
</ul> 


</main>
</body>
</html>
<?php
}