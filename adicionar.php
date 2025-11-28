<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $plataforma = $_POST['plataforma'];
    $ano = $_POST['ano'];

    $sql = "INSERT INTO series (titulo, genero, plataforma, ano) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $titulo, $genero, $plataforma, $ano);

    if ($stmt->execute()) {
        // Redireciona para pagina1.php após adicionar
        header("Location: pagina1.php");
        exit();
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Série</title>
    
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
                    <div class="card-header bg-danger text-white">
                        <h4 class="mb-0">Adicionar Nova Série</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" name="titulo" required>
                            </div>
                            <div class="mb-3">
                                <label for="genero" class="form-label">Gênero</label>
                                <input type="text" class="form-control" name="genero" required>
                            </div>
                            <div class="mb-3">
                                <label for="plataforma" class="form-label">Plataforma (Streaming)</label>
                                <input type="text" class="form-control" name="plataforma" required>
                            </div>
                            <div class="mb-3">
                                <label for="ano" class="form-label">Ano de Lançamento</label>
                                <input type="number" class="form-control" name="ano" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Salvar</button>
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