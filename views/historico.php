<!DOCTYPE html>
<html>
<?php
	if(!isset($_SESSION['tipo_pagamento'])){
		die('Você não tem items no carrinho e não fechou o pedido!');
	}
?>

<head>
	<title>DeliveryPlug</title>
	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>fonts-6/css/all.css">
	<link href="<?php echo INCLUDE_PATH; ?>css3/style.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="Keywords" content="delivery, pedir comida">
	<meta name="description" content="A comida que você pediu, quentinha no conforto da sua casa">
	<meta charset="utf-8">
	<meta name="author" content="Raul Nascimento Cruz">
</head>
<body>


<div class="lista-pedidos">
		<div class="center">
		<h3><i class="fa-regular fa-hourglass-half"></i> Pedido em andamento!</h3>

		<p>Tipo de pagamento: <?php echo $_SESSION['tipo_pagamento']; ?></p>

		<p>Total: R$ <?php echo number_format(deliveryModel::getTotalPedido(), 2, ',', ' '); ?></p>

		<?php
			
			if($_SESSION['tipo_pagamento'] == 'dinheiro'){
				echo '<hr>';
				echo '<p>Troco: '.$_SESSION['valor_troco'].'</p>';
			}

		?>

	<div class="clear"></div>
	</div><!--container-->
</div>

<div class="lista-pedidos">
		<div class="center">
			<h3>Itens do seu pedido:</h3>

			<?php
				$carrinhoItems = deliveryModel::getItemsCart();
				foreach ($carrinhoItems as $key => $value) {
				$item = deliveryModel::getItem($value);
			?>
			<div class="pedido-single">
				<img src="<?php echo INCLUDE_PATH.'images/'.$item[0]; ?>" />
				<h1 style="float: left;"><?= $item[1]; ?></h1>
				<p>R$ <?php echo $item[2]; ?></p>
			</div>

			<?php
				}
			?>

		
	<div class="clear"></div>
	</div>
</div>

<div class="btn-entregue">
	<div class="center">
		<a href="<?php echo INCLUDE_PATH ?>historico?resetar">Pedido Entregue</a>

		<?php
			if(isset($_GET['resetar'])){
				session_destroy();
				header('Location: '.INCLUDE_PATH);
			}
		?>
	<div class=clear></div>
	</div>
	
</div>



</body>
</html>