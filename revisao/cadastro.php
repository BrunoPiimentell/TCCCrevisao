<?php
    include 'conecta.php';
    $nome = $_POST['nome'];
    $celular = $_POST['celular'];
    $idade = $_POST['idade'];
    $query = $conn->query("SELECT * FROM cliente WHERE nome='$nome' AND celular='$celular'");
    if (mysqli_num_rows($query) > 0) 
    {
        echo "<script language='javascript' type='text/javascript'>
            alert('Cliente já existe em nossa base de dados!');
            window.location.href='index.php'
            </script>";
            exit();
    }
    else
    {
        $sql = "INSERT INTO cliente(nome,celular,idade) VALUES ('$nome','$celular','$idade')";
        if (mysqli_query($conn, $sql)) 
    {
        echo "<script language='javascript' type='text/javascript'>
            alert('Cliente cadastrado com sucesso!');
            window.location.href='index.php'
            </script>";
    }
    else
    {
        echo "Erro: ".mysqli_connect_error().PHP_EOL;
    }
}
    mysqli_close($conn);
?>