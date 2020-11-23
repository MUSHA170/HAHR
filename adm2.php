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
    <title>PAGINA PARA ADMINISTRADORES</title>
    <link rel="stylesheet" href="styleAdm.css">

    
        <!-- CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<style>
    td{
    border: solid 1px black;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    .tabela{
        width: auto;
        overflow:auto;
    }
    table{
        width:100%;
    }

    .tudo {
    width: 90%;
    margin: auto;
    box-shadow: 7px 22px 66px -10px #000A4B;
    }


    .logo{
    height: 180px;
    width: 180px;

    }
    .header{
    background-image: linear-gradient(180deg,#000,transparent);
    background-color: rgb(37, 67, 122);
    height: 200px;
    display: flex;
    align-items: center;
    border-top:7px solid #250083;
    border-bottom:7px solid s#250083;
    }


    ul {
    text-align: center;
    }

    li {
    display: inline-block;
    margin: auto;
    }

    .corpo{
    width: auto;
    height: auto;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    }
    .botao{
    width: auto;
    height: 150px;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    }

    .rodape{
    display: flex;
    justify-content:space-around;
    padding-top: 15px;
    width: auto;
    background-color: rgb(255, 255, 255);
    border-top:5px solid #3710ad;

    }


</style>

</head>
<body>
    <div class="tudo">
            <div class="header">
                <img class="logo" src="imagens/fullgassemfundo.png" alt="Logotipo">
				
			    <ul>
                    <li><a class="btn btn-outline-primary btn-lg" href="index.html">HOME</a></li>
                </ul>
            </div>

        <div class="tabela">
            <table >
                <tr>
                    <td><strong>ID</strong></td>
                    <td><strong>NOME</strong></td>
                    <td><strong>EMAIL</strong></td>
                    <td><strong>CIDADE</strong></td>
                    <td><strong>ESTADO</strong></td>
                    <td><strong>BAIRRO</strong></td>
                    <td><strong>ENDEREÇO</strong></td>
                    <td><strong>NÚMERO</strong></td>
                    <td><strong>TELEFONE</strong></td>
                    <td><strong>P13</strong></td>
                    <td><strong>P20</strong></td>
                    <td><strong>P45</strong></td>
                    <td><strong>TOTAL</strong></td>
                    <td><strong>HORA DO PEDIDO</strong></td>
                    <td><strong>DATA DO PEDIDO</strong></td>
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
        </div><!-- tab -->


        <div class="rodape">
                <p>@2020 dominio.com | Designed by : Airton and Victoria</p> 
                <p><a href="">Termos|</a><a href="">Privacidade|</a><a href="">Cookies</a></p> 
        </div>
    </div> 
</body>
</html>