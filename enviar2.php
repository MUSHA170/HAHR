<?php

    ///conexao com banco
try {
    $pdo = new PDO("mysql:host=localhost;dbname=fullgas", "root", "");
} catch (PDOException $e) {
    echo"Erro com banco de dados: ".$e->getMessage();
} catch(Exception $e){
    echo"Erro Generico".$e->getMessage();
}



    /* dados usuario */
    $usuario_nome = $_POST["nome"];
    $usuario_email = $_POST["email"];
    $usuario_endereco = $_POST["endereco"];
    $usuario_bairro = $_POST["bairro"];
    $usuario_cidade = $_POST["cidade"];
    $usuario_estado = $_POST["estado"];
    $usuario_numero = $_POST["numero"];
    $usuario_telefone = $_POST["telefone"];

    /* quantidade de prod */
    $quant_p13 = $_POST["p13"];
    $quant_p20 = $_POST["p20"];
    $quant_p45 = $_POST["p45"];

    /* add preço e pegar total*/
    $preco_p13 = $quant_p13 * 69.98;
    $preco_p20 = $quant_p20 * 128;
    $preco_p45 = $quant_p45 * 289;
    $total = $preco_p13 + $preco_p20 + $preco_p45;

    /* pegar hora e data */
    date_default_timezone_set("America/Sao_Paulo");
    $hora = date("H i s"); 
    $dia = date("j M o");

    /* Verifica se todo os dados foram preenchidos */
    if ($usuario_nome == null || $usuario_email == null || $usuario_endereco == null || $usuario_bairro == null || $usuario_cidade == null || $usuario_estado == null || $usuario_numero == null || $usuario_telefone == null) {
        # code...
        echo("preencha todos os dados");
    }else {
        /* verifica se o user escolheu pelo menos 1 produto */
        if ($total > 0) {
            /* enviar para o bd */ 
            $enviar = $pdo->prepare("INSERT INTO pedidos(nome, email, cidade, estado, endereço, bairro,	numero,	telefone, p13, p20,	p45, total,	horas, dia	) VALUES 
            (:bvNome, :bvEmail, :bvCidade, :bvEstado, :bvEndereco, :bvBairro, :bvNumero, :bvTelefone, :bvP13, :bvP20, :bvP45, :bvTotal, :bvHora, :bvDia)" );
            $enviar->bindValue(":bvNome",$usuario_nome);
            $enviar->bindValue(":bvEmail",$usuario_email);
            $enviar->bindValue(":bvCidade",$usuario_cidade);
            $enviar->bindValue(":bvEstado",$usuario_estado);
            $enviar->bindValue(":bvEndereco",$usuario_endereco);
            $enviar->bindValue(":bvbairro",$usuario_bairro);
            $enviar->bindValue(":bvNumero",$usuario_numero);
            $enviar->bindValue(":bvTelefone",$usuario_telefone);

            $enviar->bindValue(":bvP13",$quant_p13);
            $enviar->bindValue(":bvP20",$quant_p20);
            $enviar->bindValue(":bvP45",$quant_p45);

            $enviar->bindValue(":bvTotal",$total);
            $enviar->bindValue(":bvHora",$hora);
            $enviar->bindValue(":bvDia",$dia);


            $enviar->execute();

            header ("Location: produtos.html");
            
        }else {
            echo("vc nao escolheu um produto");
        }
    }




?>

