<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM series WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: pagina1.php");
        exit();
    } else {
        echo "Erro ao excluir registro.";
    }
} else {
    header("Location: pagina1.php");
}
?>