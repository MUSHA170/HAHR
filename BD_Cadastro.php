<?php
    ///conexao com banco
    try {
        //code...
        $pdo = new PDO("mysql:host=localhost;dbname=fullgas", "root", "");
    } catch (PDOException $e) {
        //throw $th;
        echo"Erro com banco de dados: ".$e->getMessage();
    } catch(Exception $e){
        echo"Erro Generico".$e->getMessage();
    }

/*     $usuario_nome = "NOMETESTE";
    $usuario_email = "EMAILTESTE@TESTE";
    $usuario_senha = "SENHATESTES123"; */

    $usuario_nome = $_POST["nome"];
    $usuario_email = $_POST["email"];
    $usuario_senha = $_POST["senha"];
    $usuario_endereco = $_POST["endereco"];
    $usuario_complemento = $_POST["complemento"];
    $usuario_telefone = $_POST["telefone"];
    $usuario_cidade = $_POST["cidade"];
    $usuario_estado = $_POST["estado"];


     //1° jeito
$res = $pdo->prepare("INSERT INTO clientes(nome, email, senha, endereco, complemento, telefone, cidade, estado) VALUES (:bvNome, :bvEmail, :bvSenha, :bvEndereco, :bvComplemento, :bvTelefone, :bvCidade, :bvEstado)" );

$res->bindValue(":bvEmail",$usuario_email);
$res->bindValue(":bvNome",$usuario_nome);
$res->bindValue(":bvSenha",$usuario_senha);
$res->bindValue(":bvEndereco",$usuario_endereco);
$res->bindValue(":bvComplemento",$usuario_complemento);
$res->bindValue(":bvTelefone",$usuario_telefone);
$res->bindValue(":bvCidade",$usuario_cidade);
$res->bindValue(":bvEstado",$usuario_estado);
$res->execute();

header ("Location: login.html");
/* //2° jeito
$pdo->query("INSERT INTO clientes(nome, email, senha) VALUES ($usuario_nome, $usuario_email, $usuario_senha)"); */



?>