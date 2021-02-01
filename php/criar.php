<?php
session_start();
require_once 'db.php';


function validaCPF($cpf) {
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
    if (strlen($cpf) != 11) {
        return false;
    }
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}

try{

    if(!validaCPF($_POST['CPF'])){
        $_SESSION['mensagem_nok'] = 'CPF inválido';

        header("Location: index.php");
        exit();
    }



    $stmt = $pdo->prepare('insert into clientes (nome, cpf, email, telefone, cep, endereco, numero, complemento, cidade, estado) values (:nome, :cpf, :email, :telefone, :cep, :endereco, :numero, :complemento, :cidade, :estado)');
    $stmt->execute([
        ':nome' => $_POST['nome'], 
        ':cpf' => $_POST['CPF'], 
        ':email' => $_POST['email'],
        ':telefone' => $_POST['telefone'],
        ':cep' => $_POST['CEP'],
        ':endereco' => $_POST['endereco'],
        ':numero' => $_POST['numero'] ?: 0,
        ':complemento' => $_POST['complemento'],
        ':cidade' => $_POST['cidade'],
        ':estado' => $_POST['estado']
    ]);

    $_SESSION['mensagem_ok'] = 'Usuário '.$_POST['nome'].' e id '.$pdo->lastInsertId(). ' criado com sucesso';

    header("Location: index.php");
    exit();


} catch(Exception $e){
    var_dump($e);
}
