<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM Series ORDER BY name ASC";

$sql = "SELECT id, name, canal, ano, temporadas, avaliacao FROM Series ORDER BY name ASC";

$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de séries assistidas</title>

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.js"></script>
    <style type="text/css">
        .container{
            margin-top: 50px;
            margin-left: 100px;
        }
        </style>
        </head>
    <body>
        <div class="container">
            <h1>Cadastro de séries assistidas</h1>
            <p><a href="form-add.php">Adicionar Série</a></p>
            <h2>Lista de séries assistidas</h2>
            <p>Total de séries: <?php echo $total ?></p>
            <?php if ($total > 0): ?>
            <table class="table table-striped" width="50%" border="1">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Canal</th>
                        <th>Ano</th>
                        <th>Temporadas</th>
                        <th>Avaliação</th>
                    </tr>
                </thdead>
            <tbody>
                <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $super['name'] ?></td>
                <td>
                    <a href="form-edit.php?id=<?php echo $super['id'] ?>">Editar</a>
                    <a href="delete.php?id=<?php echo $super['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                </td>
            </tr>
            <?php endwhile; ?>
            </tbody>
            </table>
            <?php else: ?>
            <p>Nenhuma série registrada</p>
            <?php endif; ?>
        </div>
    </body>
</html>