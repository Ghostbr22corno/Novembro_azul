<?php
include("conexao.php");

$cpf = $_POST['cpf'];
$cpf = preg_replace('/[^0-9]/', '', $cpf);

$sql = "SELECT * FROM pacientes WHERE cpf = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $cpf);
$stmt->execute();
$resultado = $stmt->get_result();

echo '<link rel="stylesheet" href="estilo.css">';
echo '<div class="container">';

if ($resultado->num_rows > 0) {
    $dados = $resultado->fetch_assoc();
    echo "<h2>Bem-vindo, " . htmlspecialchars($dados['nome']) . "!</h2>";
    echo "<p>Sua consulta está marcada para: <b>" . date('d/m/Y', strtotime($dados['data_consulta'])) . "</b></p>";
    echo "<hr>";
    echo "<h3>Dicas de Prevenção:</h3>";
    echo "<ul>
            <li>Realize exames preventivos regularmente.</li>
            <li>Mantenha uma alimentação saudável e equilibrada.</li>
            <li>Pratique atividades físicas.</li>
            <li>Evite o consumo excessivo de álcool e cigarro.</li>
            <li>Converse com seu médico sobre a saúde da próstata.</li>
          </ul>";
} else {
    echo "<h3>CPF não encontrado!</h3><a href='acessar.php'>Voltar</a>";
}

echo '</div>';
$conexao->close();
?>