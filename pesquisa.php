<?php
// Inicia a sessão
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  // Redireciona para a página de login
  header("Location: login.php");
  exit;
}
?>

<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #4CAF50;
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

.total {
  font-weight: bold;
}
</style>




<?php
// verificando se foi feito um submit no formulário
if (isset($_GET['tabela'])) {

  // recebendo os valores do formulário
  $tabela = $_GET['tabela'];
  $data_inicial = $_GET['data_inicial'];
  $data_final = $_GET['data_final'];
  $placa = $_GET['placa'];

  // conectando ao banco de dados
  $servidor = "br54.hostgator.com.br";
  $usuario = "monume18_admin";
  $senha = "Di140191*";
  $banco = "monume18_atendimentos";

  $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

  if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
  }

  // construindo a query SQL
  $query = "SELECT * FROM $tabela WHERE dia BETWEEN '$data_inicial' AND '$data_final'";
  if (!empty($placa)) {
    $query .= " AND placa = '$placa'";
  }

  // executando a query SQL
  $result = mysqli_query($conexao, $query);

  // verificando se a query retornou algum resultado
  if (mysqli_num_rows($result) > 0) {
    // exibindo os resultados em uma tabela HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Dia</th><th>Nome</th><th>Placa</th><th>Veículo</th><th>Motivo</th><th>Origem</th><th>Destino</th><th>Prestador</th><th>KM</th><th>Valor</th></tr>";
    $soma = 0; // variável para guardar a soma dos valores
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row["id"] . "</td><td>" . date('d/m/Y', strtotime($row["dia"])) . "</td><td>" . $row["nome"] . "</td><td>" . $row["placa"] . "</td><td>" . $row["veiculo"] . "</td><td>" . $row["motivo"] . "</td><td>" . $row["origem"] . "</td><td>" . $row["destino"] . "</td><td>" . $row["prestador"] . "</td><td>" . $row["km"] . "</td><td>R$ " . number_format($row["valor"], 2, ',', '.') . "</td></tr>";
      $soma += $row["valor"]; // adicionando o valor na variável soma
    }
    echo "<tr class='total'><td colspan='10'>Total:</td><td>R$ " . number_format($soma, 2, ',', '.') . "</td></tr>";
    echo "</table>";
  } else {
    echo "Nenhum resultado encontrado.";
  }
  



// Obtendo o número de cadastros por dia do mês vigente
// obtendo o número de cadastros por dia do mês vigente
$query_cadastros_dia = "SELECT DAY(dia) AS dia, COUNT(*) AS num_cadastros FROM $tabela WHERE MONTH(dia) = MONTH(CURRENT_DATE()) GROUP BY dia";
$result_cadastros_dia = mysqli_query($conexao, $query_cadastros_dia);
$labels_cadastros_dia = [];
$data_cadastros_dia = [];
$total_cadastros_mes = 0;
while ($row_cadastros_dia = mysqli_fetch_assoc($result_cadastros_dia)) {
  $labels_cadastros_dia[] = $row_cadastros_dia['dia'];
  $data_cadastros_dia[] = $row_cadastros_dia['num_cadastros'];
  $total_cadastros_mes += $row_cadastros_dia['num_cadastros'];
}
$media_mensal = $total_cadastros_mes / count($data_cadastros_dia);
$media_coluna_valor = array_sum($data_cadastros_dia) / count($data_cadastros_dia);

// adicionando a média mensal da soma da coluna $valor
$data_cadastros_dia[] = $media_coluna_valor;
$labels_cadastros_dia[] = 'Média Coluna';
 
// exibindo o gráfico de número de cadastros por dia e média mensal
echo "<canvas id='grafico-cadastros'></canvas>";
echo "<script src='https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js'></script>";
echo "<script>";
echo "var ctx = document.getElementById('grafico-cadastros').getContext('2d');";
echo "var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: " . json_encode($labels_cadastros_dia) . ",
            datasets: [{
                label: 'Número de Cadastros por Dia',
                data: " . json_encode($data_cadastros_dia) . ",
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Número de Cadastros por Dia e Média Mensal'
                }
            }
        }
    });";
echo "</script>";



  // fechando a conexão com o banco de dados
  mysqli_close($conexao);

}
?>