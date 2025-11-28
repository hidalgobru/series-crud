<?php
include 'conexao.php';

// 1. Verificamos se foi passado um ID pela URL ou se veio pelo formulário (POST)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} elseif (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    // Se não tiver ID nenhum, redireciona para a página principal (pagina1.php)
    header("Location: pagina1.php");
    exit();
}

// Busca os dados atuais para preencher o formulário
$sql = "SELECT * FROM series WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$serie = $result->fetch_assoc();

// Se não achar a série no banco, volta pra pagina1
if (!$serie) {
    header("Location: pagina1.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $plataforma = $_POST['plataforma'];
    $ano = $_POST['ano'];
    $id_atualizar = $_POST['id']; // Pega o ID do campo oculto

    $sql_update = "UPDATE series SET titulo=?, genero=?, plataforma=?, ano=? WHERE id=?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sssii", $titulo, $genero, $plataforma, $ano, $id_atualizar);

    if ($stmt_update->execute()) {
        // Sucesso! Redireciona para a página principal
        header("Location: pagina1.php");
        exit();
    } else {
        echo "Erro ao atualizar.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Série</title>
    
    <!-- Fonte Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">Editar Série</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <!-- 2. CAMPO OCULTO (IMPORTANTE): Envia o ID junto com os dados -->
                            <input type="hidden" name="id" value="<?php echo $serie['id']; ?>">

                            <div class="mb-3">
                                <label class="form-label">Título</label>
                                <input type="text" class="form-control" name="titulo" value="<?php echo htmlspecialchars($serie['titulo']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gênero</label>
                                <input type="text" class="form-control" name="genero" value="<?php echo htmlspecialchars($serie['genero']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Plataforma</label>
                                <input type="text" class="form-control" name="plataforma" value="<?php echo htmlspecialchars($serie['plataforma']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ano</label>
                                <input type="number" class="form-control" name="ano" value="<?php echo $serie['ano']; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-warning w-100">Atualizar</button>
                            <!-- Botão voltar agora aponta para pagina1.php -->
                            <a href="pagina1.php" class="btn btn-secondary w-100 mt-2">Voltar</a>
                        </form>
                    </div>
                </div>
                <footer class="mt-4 text-center text-muted">
                    <small>Equipe: Guilherme Rocha e Bruna Hidalgo</small>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>