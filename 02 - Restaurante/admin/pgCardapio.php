<?php
    require_once 'config.php';
    require_once 'menu.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets\css\style.css">
</head>

<body>

    <div class="container mt-3">
        <!-- Botão Modal Cadastro - Início -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Adicionar Cardápio
        </button>

        <!-- Modal Cadastro -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro Cardápio</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="opCardapio.php" method="post" enctype="multipart/form-data">
                            <!-- enctype="multipart/form-data" - a propiedade "permite" enviar a imagem para o banco de dados(na vdd so envia o nome) -->
                            <div class="mb-3">
                                <label class="form-label">Cardápio</label>
                                <input type="text" class="form-control" name="txt_cardapio"
                                    placeholder="Digite o nome do Cardápio">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Foto</label>
                                <input class="form-control" type="file" name="file_foto">
                            </div>

                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Listagem Início -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cardápio</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $lista = $pdo->query("SELECT * FROM cardapios"); //QUERY - linguagem "crua" do sql. J ao PREPARE é uma versão modificada

                    while($linha = $lista->fetch(PDO::FETCH_ASSOC)){

                ?>

                <tr>
                    <th scope="row"> <?php echo $linha['idcardapio'] ?> </th>
                    <td><?php echo $linha['cardapio'] ?></td>
                    <td><?php echo $linha['foto'] ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#ModalCadatro">
                            Editar
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#ModalCadastro">
                            Excluir
                        </button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- Listagem Fim -->
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="assets\js\script.js"></script>
</body>

</html>