<?php
require 'init.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}

$PDO = db_connect();
$sql = "SELECT name, canal, ano, temporadas, avaliacao FROM series WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id, $id, PDO::PARAM_INIT');
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!is_array($user))
{
    echo "Nenhuma série encontrada";
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edição de série></title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script
    </head>
    <body>
    <div class="container">
        <h1>Cadastro de séries</h1>
        <h2>Edição de série</h2>
        <form action="edit.php" method="post">
        <div class="form-group">
            <label for="name">Nome: </label>
            <input type="text" class="form-control col-sm" name="name" id="name" style="width:25%";
                value="<?php echo $user['email']; ?>"
    </div>
    <input type="hidden" name="id" value=",<?php echo $id; ?>">
    <button type="submit" class="btn btn-primary">Alterar</Button>
</form>
</html>
</div>
</html>