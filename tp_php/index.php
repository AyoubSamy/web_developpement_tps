<?php
require_once "./db.inc.php";

$sql = "SELECT * FROM users";

$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_OBJ);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/sketchy/bootstrap.min.css">
</head>

<body>
    <div class="container-md mt-3">
        <h1>Liste des utilisateurs</h1>
        <form action="add.php" method="post" class="my-3">
            <input type="text" class="form-control mb-2" name="email" placeholder="Email">
            <input type="password" class="form-control mb-2" name="pass" placeholder="Password">
            <select name="role" id="" class="form-select mb-2">
                <option value="guest">Guest</option>
                <option value="admin">Admin</option>
                <option value="author">Author</option>
                <option value="editor">Editor</option>
            </select>
            <button class="btn btn-primary d-block w-100">Ajouter un utilisateur</button>
        </form>
        <hr>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>ROLE</th>
                <th colspan="2" class="text-center">Actions</th>
                
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->password ?></td>
                    <td><?= $user->role ?></td>
                    <td class="text-center"><a href="del.php?idd=<?= $user->id ?>" class="btn btn-danger" onclick="validate(event)">X</a></td>
                    <td class="text-center"><a href="edit.php?idd=<?= $user->id ?>" class="btn btn-success">Ed</a></td>
                </tr>
            <?php endforeach ?>
        </table>
        <pre><?php print_r($users) ?></pre>
    </div>
    <hr>
    <script>
        function validate(evt) {
            evt.preventDefault()
            if(confirm('Etes vous sur de vouloir supprimer'))
                location.href = evt.target.href
        }
    </script>
</body>

</html>