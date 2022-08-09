<!DOCTYPE html>
<html>
<?php
	if(!isset($_SESSION['carrinho'])){
		die('Você não tem items no carrinho!');
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

	<section class="descricao-home">
		<div class="center">
			<h2><i class="fa-solid fa-cart-shopping"></i> Carrinho</h2>
			<a style="font-size: 17px; margin-top: 15px;" href="<?= INCLUDE_PATH ?>home"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
			<div class="clear"></div>
		</div><!--container-->
	</section>

	<div class="lista-pedidos">
		<div class="center">
			<h3>Pedidos</h3>
			<?php
				$carrinhoItems = deliveryModel::getItemsCart();
				foreach ($carrinhoItems as $key => $value) {
				$item = deliveryModel::getItem($value);
			?>
			<div class="pedido-single">
				<img src="<?php echo INCLUDE_PATH.'images/'.$item[0]; ?>" />
				<p>R$ <?php echo $item[2]; ?></p>
			</div>
			<?php
			}
		?>
			<div style="border: 0;" class="pedido-single">
				<p style=" color: yellow;">TOTAL: R$ <?php echo number_format(deliveryModel::getTotalPedido(), 2, ',', ' '); ?></p>
			</div>
		
		<div class="clear"></div>
		</div>
	</div>

	

	<div class="center">
		<div class="box-pagamento right">
			<form method="post">
				<p>Método de pagamento:</p>

				<select name="opcao_pagamento">
					<option value="cartao credito">Cartão de Crédito</option>
					<option value="cartao debito">Cartão de Debito</option>
					<option value="dinheiro">Dinheiro</option>
				</select>

				<div style="display: none;" class="troco">
					<p>Troco para quanto?</p>
					<input type="text" name="troco">
				</div>

				<input type="submit" name="acao" value="Pedir">
			</form>
		</div>
	<div class="clear"></div>
	</div>

	

	<?php
		if(isset($_POST['acao'])){
			if(!isset($_SESSION['carrinho'])){
				die('você não tem items no carrinho!');
			}

			$metodoPagamento = $_POST['opcao_pagamento'];
			$_SESSION['tipo_pagamento'] = $metodoPagamento;
			$_SESSION['total'] = deliveryModel::getTotalPedido();
			if($metodoPagamento == 'dinheiro'){
				if($_POST['troco'] != ''){
					$valorTroco = $_POST['troco'] - deliveryModel::getTotalPedido();
					if($valorTroco >= 0){
					$_SESSION['valor_troco'] = $valorTroco;
					}else{
						die('Você não especificou um valor correto para o troco!');
					}

				}else{
					die('você escolheu dinheiro como pagamento, portanto precisa especificar o troco!');
				}
			}
			echo '<script>alert("Seu pedido foi efetuado com sucesso!")</script>';
			echo '<script>location.href="'.INCLUDE_PATH.'historico"</script>';
		}
	?>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script>
		$('select').change(function(){
			if($(this).val() == 'dinheiro'){
				$('.troco').show();
			}else{
				$('.troco').hide();
			}
		})
	</script>

</body>
</html>