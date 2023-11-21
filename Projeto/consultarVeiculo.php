<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConsultaEstoque</title>
    <link rel="stylesheet" href="formata9.css">
    <link rel="stylesheet" href="estilo4.css">
    <link rel="stylesheet" href="estilo3.css">
    <link rel="stylesheet" href="estilo5.css">
    <style>
          table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    .resultado {
        margin-bottom: 10px;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        width: 20%;
        color:white;
    }
        
    
    </style>
    
</head>
<body>

<header>
    <h1>Consultar Veículos Estacionados</h1>
</header>

<main>

<div class="login-box">
  <form method="POST" action="consultarVeiculo.php">
    <div class="user-box">
    <input type="date" required="required" maxlength="10" name="dt"></p>
    </div>
    <a href="consultaVeiculo.php">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <input type="submit" value="Consultar">
    </a>
  </form>
</div>

<div class="d-flex flex-column justify-content-center w-100 h-100">

    <div class="d-flex flex-column justify-content-center align-items-center">
        
        <div class="btn-group my-5">
            <a href="https://codepen-api-export-production.s3.us-west-2.amazonaws.com/zip/PEN/pyBNzX/1578778289271/pure-css-gradient-background-animation.zip" class="btn btn-outline-light" aria-current="page"><i class="fas fa-file-download me-2"></i></a>
            <a href="https://codepen.io/P1N2O/full/pyBNzX" class="btn btn-outline-light"><i class="fas fa-expand ms-2"></i></a>
        </div>
        <a href="https://manuel.pinto.dev" class="text-decoration-none">
            
        </a>
    </div>
</div>
</div>

<ul class="menu cf">
<li><a href="paginaEstoque.php" data-text="Pagina inicial">PAGINA INCIAL</a></li> 
<li><a href="registrarVeiculo.php" data-text="Registrar Veiculo">REGISTRAR VEICULO</a></li> 
<li><a href="consultarVeiculo.php" data-text="Consultar Veiculos">CONSULTAR VEICULOS</a></li> 
<li><a href="registrarSaida.php" data-text="Registrar Saida">REGISTRAR SAÍDA</a></li>                                
<li><a href="consultarSaidas.php" data-text="Consultar Saidas">CONSULTAR SAÍDAS</a></li> 
</ul>

<?php



if (isset($_POST["dt"])) {
    $dt = $_POST["dt"];
} else {
    $dt = null;
}






if ($dt != null) {

    include("conectaBanco.php");

    $sql = "SELECT placa, nome, cor, hrentrada , dt FROM veiculos WHERE dt = '$dt'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<strong>Carros Estacionados na Data $dt </strong> <br><br>";
        while ($row = $result->fetch_assoc()) {

            echo " <div class='resultado'> Placa: " . $row["placa"] . "<br> Nome: " . $row["nome"] .
                "<br> Cor: " . $row["cor"] . "<br> Hr Entrada: " . $row["hrentrada"] .
                "<br> Data: " . $row["dt"] . "<br></div>";
        }
    } else {
        echo "<br> Nada Encontrado!! <br>";
    }

}






?>

</main>
    <footer>
    <h3>Gerenciamento de Estacionamento - Samuel Bueno - Vitor Hugo &copy; <h3>
    </footer>
</body>
</html>