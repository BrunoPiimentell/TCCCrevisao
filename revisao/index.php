<?php
    session_start();
    include 'conecta.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-language" content="pt-br">
        <title>Projeto Revisão</title>
        <link href="scripts/bootstrap5/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #08546c;
            }
            
            .header {
                float: right;
            }
        </style>
    </head>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="scripts/bootstrap5/js/bootstrap.min.js"></script>
        <div class="container-fluid">
            <img src="img/senainegativo.png" width="20%" height="20%" alt="">
            <hr>
        </div>
        <center>
            <h1><p style="color: white; font-weight: bold;">CRUD</p></h1>
        </center>
        <nav></nav>
        <main>
            <div class="container">
                <div class="row justify-content-center row-cols-1 row-cols-2 mb-2 text-center">
                    <div class="col-md-6">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-reader py-3">
                                <b>Cadastro de Clientes</b>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Celular</th>
                                            <th scope="col">Idade</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $pesquisa = mysqli_query($conn, "SELECT * FROM cliente");
                                            $row = mysqli_num_rows($pesquisa);
                                            if ($row > 0)
                                            {
                                                while ($cliente = $pesquisa->fetch_array())
                                                {
                                                    $id = $cliente['id'];
                                                    echo "<tr>";
                                                    echo "<td>".$cliente['id']."</td>";
                                                    echo "<td>".$cliente['nome']."</td>";
                                                    echo "<td>".$cliente['celular']."</td>";
                                                    echo "<td>".$cliente['idade']."</td>";
                                                    echo "<td><a href='#?id='$id' data-bs-toggle='modal' data-bs-target='#editaCliente$id'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='red' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                                  </svg></a> | <a href='excluir.php?id=$id'> <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='red' class='bi bi-trash' viewBox='0 0 16 16'>
                                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                                                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
                                                  </svg> </a></td>";
                                                  ?>
                                                  <div class="modal fade" id="editaCliente<?php echo $id; ?>" tabindex="-1" aria-labelledby="editaCliente" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editaCliente">Edição de Clientes</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php
                                                                    $query2 = mysqli_query($conn, "SELECT * FROM cliente WHERE id=$id");
                                                                    if ($query2->num_rows > 0) 
                                                                    {
                                                                        while ($cliente2 = $query2->fetch_array()) 
                                                                        {
                                                                            $id = $cliente2['id'];
                                                                            $nome = $cliente2['nome'];
                                                                            $celular = $cliente2['celular'];
                                                                            $idade = $cliente2['idade'];
                                                                        }
                                                                    }
                                                                ?>
                                                                <form action="atualiza.php?id=<?php echo $id; ?>" method="POST">
                                                                    <div class="form-group" style="text-align: left;">
                                                                        <label class="form-label">ID</label>
                                                                        <input type="text" class="form-control" name="id" value="<?php echo $id; ?>" disabled/>
                                                                        <label class="form-label">Nome</label>
                                                                        <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>"/>
                                                                        <label class="form-label">Celular</label>
                                                                        <input type="text" class="form-control" name="celular" value="<?php echo $celular; ?>"/>
                                                                        <label class="form-label">Idade</label>
                                                                        <input type="number" class="form-control" name="idade" value="<?php echo $idade; ?>"/>
                                                                        <br>
                                                                        <button type="submit" class="btn btn-outline-success mb-3">Atualizar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  <?php
                                                    echo "</tr>";
                                                }
                                            }
                                            else
                                            {
                                                echo "Não há clientes cadastrados!";
                                                mysqli_close($conn);
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <button type="button" class="w-100 btn btn-lg btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Cliente</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="cadastro.php?id=<?php echo $id; ?>" method="POST">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label class="form-label">Nome</label>
                                                        <input type="text" class="form-control" name="nome"/>
                                                        <label class="form-label">Celular</label>
                                                        <input type="text" class="form-control" name="celular"/>
                                                        <label class="form-label">Idade</label>
                                                        <input type="number" class="form-control" name="idade">
                                                        <br>
                                                        <button type="submit" class="btn btn-outline-success mb-3">Cadastrar</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>