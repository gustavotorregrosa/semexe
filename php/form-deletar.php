<?php 

    session_start(); 
    require_once 'db.php';

    $cliente;

    try {
        $id = $_GET['id'];
        $queryString = "select * from clientes where id =".$id;
        $stmt = $pdo->prepare($queryString);
        if($stmt->execute()){
            $cliente = $stmt->fetch(PDO::FETCH_OBJ);
        }
    }catch (Exception $e){
        var_dump($e);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semexe - CRUD Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Semexe</a>
        </div>
    </nav>

    <br /><br /><br />

    <div class="container">
        <form action="deletar.php" method="post" class="row">
        <h5>Deseja mesmo deletar o seguinte usuário?</h5>
            <input type="hidden" name="id" value="<?php echo $cliente->id; ?>" />
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input disabled type="text" name="nome" class="form-control" value="<?php echo $cliente->nome; ?>" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input disabled type="email" name="email" value="<?php echo $cliente->email; ?>" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Telefone</label>
                <input disabled  type="text" name="telefone"  value="<?php echo $cliente->telefone; ?>" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">CPF</label>
                <input disabled type="text" name="CPF"  value="<?php echo $cliente->cpf; ?>"  class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">CEP</label>
                <input disabled type="text" class="form-control" name="CEP"  value="<?php echo $cliente->cep; ?>"  id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Endereço</label>
                <input  disabled type="text" class="form-control" name="endereco"  value="<?php echo $cliente->endereco; ?>"  id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Número</label>
                <input disabled type="number" class="form-control" name="numero" value="<?php echo $cliente->numero; ?>"  id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Complemento</label>
                <input disabled type="text" name="complemento" value="<?php echo $cliente->complemento; ?>" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Cidade</label>
                <input disabled type="text" class="form-control" name="cidade"  value="<?php echo $cliente->cidade; ?>"  id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Estado</label>
                <input disabled type="text" class="form-control" name="estado" value="<?php echo $cliente->estado; ?>" id="exampleFormControlInput1">
            </div>
          
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</body>

</html>