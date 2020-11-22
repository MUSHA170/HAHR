<?php 
///conexao com banco
try {
    $pdo = new PDO("mysql:host=localhost;dbname=fullgas", "root", "");
} catch (PDOException $e) {
    echo"Erro com banco de dados: ".$e->getMessage();
} catch(Exception $e){
    echo"Erro Generico".$e->getMessage();
}

    $consulta = $pdo->prepare("SELECT * FROM pedidos");
    $consulta->execute();
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDIDOS</title>
    <link rel="stylesheet" href="styleAdm.css">

    
        <!-- CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>
<body>
    <table>
        <tr>
            <td>id</td>
            <td>nome</td>
            <td>email</td>
            <td>cidade</td>
            <td>estado</td>
            <td>bairro</td>
            <td>endereço</td>
            <td>numero</td>
            <td>telefone</td>
            <td>p13</td>
            <td>p20</td>
            <td>p45</td>
            <td>total</td>
            <td>hora do pedido</td>
            <td>data do pedido</td>
        </tr>
        <?php while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){?>
        <tr>
            <td><?php echo $linha["id"]?></td>
            <td><?php echo $linha["nome"]?></td>
            <td><?php echo $linha["email"]?></td>
            <td><?php echo $linha["cidade"]?></td>
            <td><?php echo $linha["estado"]?></td>
            <td><?php echo $linha["bairro"]?></td>
            <td><?php echo $linha["endereço"]?></td>
            <td><?php echo $linha["numero"]?></td>
            <td><?php echo $linha["telefone"]?></td>
            <td><?php echo $linha["p13"]?></td>
            <td><?php echo $linha["p20"]?></td>
            <td><?php echo $linha["p45"]?></td>
            <td><?php echo $linha["total"]?></td>
            <td><?php echo $linha["dia"]?></td>
            <td><?php echo $linha["horas"]?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>