<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <title>Sistema de contatos</title>
</head>

<body>
    <nav class="navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 mx-auto">Sistema de contato</span>
        </div>
    </nav>

    <section>
        <?php $this ->loadViewInTemplate($viewName, $viewData); ?>
    </section>

    <footer>
    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 mx-auto">&copy; Todos os direitos reservados</span>
        </div>
    </nav>
    </footer>

    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>