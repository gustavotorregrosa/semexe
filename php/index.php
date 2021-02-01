<?php
session_start();
require_once 'db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Semexe - CRUD Clientes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Semexe</a>
    </div>
  </nav>

  <br /><br /><br />



  <div class="container">
    <a href="form-criar.php" class="btn btn-primary" href="#" role="button">Add cliente</a>
    <br />
    <br />
    <br />

    <?php
    if ($_SESSION['mensagem_ok']) { ?>
      <div class="alert alert-success" role="alert">
        <?php
        echo $_SESSION['mensagem_ok'];
        session_unset();
        ?>
      </div>
    <?php } ?>


    <?php
    if ($_SESSION['mensagem_nok']) { ?>
      <div class="alert alert-danger" role="alert">
        <?php
        echo $_SESSION['mensagem_nok'];
        session_unset();
        ?>
      </div>
    <?php } ?>


    <div class="row">

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">e-mail</th>
            <th scope="col">Botões</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $stmt = $pdo->prepare('select * from clientes');

          if ($stmt->execute()) {
            while ($registro = $stmt->fetch(PDO::FETCH_OBJ)) {
              echo "<tr>";
              echo '<th scope="row">' . $registro->id . '</th>';
              echo '<td>' . $registro->nome . '</td>';
              echo '<td>' . $registro->email . '</td>';
              echo '<td>
                                <a type="button" href="form-editar.php?id=' . $registro->id . '" class="btn btn-primary">Editar</a>
                                <a type="button" href="form-deletar.php?id=' . $registro->id . '" class="btn btn-danger">Deletar</a>
                            </td>';

              echo "</tr>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>

  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>

</html>