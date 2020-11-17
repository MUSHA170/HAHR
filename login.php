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

    $usuario_email_lg = $_POST["email"];
    $usuario_senha_lg = $_POST["senha"];    
    
$sql ="SELECT COUNT(*) as num FROM clientes WHERE email=:e AND senha=:s";

    $c = $pdo->prepare($sql);
    $c->bindValue(':e', $usuario_email_lg);
    $c->bindValue(':s', $usuario_senha_lg);
    $c->execute();

    $linhas = $c->fetch(PDO::FETCH_ASSOC);
    if ($linhas['num'] > 0)  {
        header ("Location: produtos.html");
    }else{
        echo"erro";
    }

?>  
