<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $celular = $_POST['celular'];
    $idade = $_POST['idade'];
    $sql = "UPDATE cliente SET nome='$nome', celular='$celular', idade='$idade' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) 
    {
        echo "<script language='javascript' type='text/javascript'>
            alert('Cliente atualizado com sucesso!');
            window.location.href='index.php'
            </script>";
    }
    else
    {
        echo "Erro: ".mysqli_connect_error().PHP_EOL;
    }
    mysqli_close($conn);
?>