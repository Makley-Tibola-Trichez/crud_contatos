<?php
require 'database.php';

$id = null;

if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("location: index.php");
} else {
    $pdo = Database::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM contatos WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::desconectar();
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Informações do Contato</title>
</head>

<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="card">
                <div class="card-header">
                    <h3 class="well">Informações do Contato</h3>
                </div>
                <div class="container">
                    <div class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Nome</label>
                            <div class="controls form-control">
                                <label class="carousel-inner">
                                    <?php echo $data['nome']; ?>
                                </label>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Email</label>
                            <div class="controls form-control disabled">
                                <label class="carousel-inner">
                                    <?php echo $data['email']; ?>
                                </label>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Telefone</label>
                            <div class="controls form-control disabled">
                                <label class="carousel-inner">
                                    <?php echo $data['telefone']; ?>
                                </label>
                            </div>
                        </div>

                        <br/>
                        <div class="form-actions">
                            <a href="index.php" type="btn" class="btn btn-default" style="margin-bottom: 8px;">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
