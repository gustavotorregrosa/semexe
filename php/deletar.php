<?php
session_start();
require_once 'db.php';

try{

    $stmt = $pdo->prepare('delete from clientes where id = :id');
    $stmt->execute([
        ':id' => $_POST['id'], 

    ]);

    $_SESSION['mensagem_ok'] = 'Usuário '.$_POST['nome'].' deletado com sucesso';

    header("Location: index.php");
    exit();


} catch(Exception $e){
    var_dump($e);
}
