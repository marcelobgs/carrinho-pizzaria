<?php
require_once "functions/cardapio.php";
$pdoConnection = require_once "connection.php";
$pizzas = getPizzas($pdoConnection);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Carrinho de Compras</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" />

</head>

<body>
	
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSite">

                <!-- <<<<<<< HEAD -->
                <ul class="navbar-nav mr-auto ">

                    <li class="nav-item  pr-5">
                        <a class="nav-link" href="index.php">
                            <h3>Pizza Planet</h3>
                        </a>
                    </li>
                </ul>


                <form class="form-inline">
                    <a href="carrinho.php" class="btn btn-danger" target="_top">Meus Pedidos</a>
                </form>

            </div>

        </div>

    </nav>

<div class="container">
		<div class="my-5">
			<div class="row">

				<?php foreach ($pizzas as $pizza) : ?>
					<div class="col-4">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?php echo $pizza['sabor'] ?></h4>
								<h6 class="card-subtitle mb-2 text-muted">
									R$ <?php echo number_format($pizza['preco'], 2, ',', '.') ?>
								</h6>

								<a class="btn btn-primary" href="carrinho.php?acao=add&id=<?php echo $pizza['id'] ?>" class="card-link">Comprar</a>
							</div>
						</div>
					</div>

				<?php endforeach; ?>
			</div>
		</div>
	</div>

</body>

</html>