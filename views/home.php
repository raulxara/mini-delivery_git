<!DOCTYPE html>
<html>
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

	<section class="descricao-home">
		<div class="center">
			<h2><i class="fa-solid fa-burger"></i> BurgueriaPHP</h2>
			<a href="<?php echo INCLUDE_PATH ?>fechar-pedido"><i class="fa-solid fa-bag-shopping"></i></a>
		<div class="clear"></div>
		</div>
	</section>

	<section class="lista-produtos">
		<div class="center">
			<h3>Faça seu pedido agora!</h3>
			<?php
				$burger = deliveryModel::listarItems();
				foreach($burger as $key=>$value){
			?>
			<div class="box-single-food">
				<img src="<?php echo INCLUDE_PATH ?>images/<?= $value['0'] ?>" />
				<h2><?php echo $value['1']; ?></h2>
				<p>R$ <?= $value['2'] ?></p>
				<a href="<?= INCLUDE_PATH ?>?addCart=<?= $key ?>"><i class="fa-solid fa-cart-shopping"></i> Adicionar</a>
			</div>
			<?php } ?>
		<div class="clear"></div>
		</div>
	</section>

</body>
</html>