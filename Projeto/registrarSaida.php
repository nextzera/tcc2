<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegistraVenda</title>
    <link rel="stylesheet" href="formata9.css">
    <link rel="stylesheet" href="estilo4.css">
    <link rel="stylesheet" href="estilo3.css">
    <link rel="stylesheet" href="estilo5.css">
    <style>
      .registro{
        font-size: 1.5rem;
        color: white;
      }
      .resultado{
            border: 5px solid white;
            color: white;
            width: 25%;
            height:28%;
            padding: 5px;
            font-size: 1.5rem;
        }
        
    
    </style>
    
</head>
<body>

<header>
    <h1>Registrar Saída do Veículo</h1>
</header>

<main>

<div class="login-box">
  <form method="POST" action="registrarSaida.php">
    <div class="user-box">
    <input type="text" required="required" name="placa" pattern="[a-zA-Z\s]{1,15}+$">
      <label>Placa</label>
    </div>



    <a href="registrarSaida.php">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <input type="submit" value="Registrar">
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



if (isset($_POST["placa"])) {
    $placa = $_POST["placa"];
} else {
    $placa = null;
}

if (isset($_POST["hrsaida"])) {
    $hrsaida = $_POST["hrsaida"];
} else {
    $hrsaida = null;
}







if ($placa != null) {

    include("conectaBanco.php");
   


    $sql = "SELECT placa, nome, cor, hrentrada , dt  FROM veiculos WHERE placa = '$placa'";
    $result = $conn->query($sql);

    // Define o fuso horário padrão
    date_default_timezone_set('America/Sao_Paulo');

    // Obtém a data e hora atual
    $horario = date('H:i:s');



    

    if ($result->num_rows > 0) {


        echo "<strong>Dados do Veiculo Placa $placa </strong> <br><br>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='resultado' >Placa: " . $row["placa"] . "<br> Nome: " . $row["nome"] .
                "<br> Cor: " . $row["cor"] . "<br> Hr Entrada: " . $row["hrentrada"] . "<br> Hr Saída: $horario" .
                "<br> Data: " . $row["dt"] . "<br> </div>";

        }
        $sql = "UPDATE saidas SET hrsaida = '$horario' WHERE placa = '$placa'";
        if ($conn->query($sql) === TRUE) {
            echo "<p class='registro'>Saída Registrada </p>";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }



    } else {
        echo "<p class='registro'> Nada Encontrado!! </p>";
    }
 

}




if ($placa != null) {


    include("conectaBanco.php");
    $sql = "DELETE FROM veiculos WHERE placa = '$placa'";

    if ($conn->query($sql) === TRUE) {

        echo "<br>Saída Realizada com Sucesso!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>




</main>
    <footer>
    <h3>Gerenciamento de Estacionamento - Samuel Bueno - Vitor Hugo &copy; <h3>
    </footer>
</body>
</html>