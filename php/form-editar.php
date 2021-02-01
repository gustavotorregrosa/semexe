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
        <form action="editar.php" method="post" class="row">
            <input type="hidden" name="id" value="<?php echo $cliente->id; ?>" />
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="<?php echo $cliente->nome; ?>" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" value="<?php echo $cliente->email; ?>" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Telefone</label>
                <input type="text" name="telefone"  value="<?php echo $cliente->telefone; ?>" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">CPF</label>
                <input type="text" name="CPF"  value="<?php echo $cliente->cpf; ?>"  class="cpf form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">CEP</label>
                <input type="text" class="form-control cep" name="CEP"  value="<?php echo $cliente->cep; ?>"  id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Endereço</label>
                <input type="text" class="form-control" name="endereco"  value="<?php echo $cliente->endereco; ?>"  id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Número</label>
                <input type="number" class="form-control" name="numero" value="<?php echo $cliente->numero; ?>"  id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Complemento</label>
                <input type="text" name="complemento" value="<?php echo $cliente->complemento; ?>" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Cidade</label>
                <input type="text" class="form-control" name="cidade"  value="<?php echo $cliente->cidade; ?>"  id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Estado</label>
                <input type="text" class="form-control" name="estado" value="<?php echo $cliente->estado; ?>" id="exampleFormControlInput1">
            </div>
          
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>

    <script>
        $(document).ready(() => {
            $(".cpf").mask("999.999.999-99")
            $(".cep").mask("99999-999")
        })
    
       
    </script>
</body>

</html>