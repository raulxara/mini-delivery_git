<?php
	class deliveryModel{



		public static $items = array(array('h1.jpg','Burger1','30.01'),array('h2.jpg','Burger2','30.02'),array('h3.jpg','Burger3','30.03'),array('h4.jpg','Burger4','30.04'),array('h5.jpg','Burger5','30.05'),array('h6.png','Burger6','30.06'),array('h7.jpeg','Burger7','30.07'),array('h8.jpg','Burger8','30.08'),array('h9.jpg','Burger9','30.09'),array('h10.png','Burger10','30.10'));

		public static function listarItems(){
			return self::$items;
		}

		public static function addToCart($idProduto){
			if(!isset($_SESSION['carrinho'])){
				$_SESSION['carrinho'] = array();
			}
			$_SESSION['carrinho'][] = $idProduto;
		}

		public static function getItemsCart(){
			return $_SESSION['carrinho'];
		}

		public static function getItem($id){
			return self::$items[$id];
		}


		public static function getTotalPedido(){
			$valor = 0;
			foreach ($_SESSION['carrinho'] as $key => $value) {
				$itemPreco = self::getItem($value)[2];
				$valor+=$itemPreco;
			}

			return $valor;
		}

	}

?>