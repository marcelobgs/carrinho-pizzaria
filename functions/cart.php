<?php 

if(!isset($_SESSION['carrinho'])) {
	$_SESSION['carrinho'] = array();
}

function addCart($id, $quantity) {
	if(!isset($_SESSION['carrinho'][$id])){ 
		$_SESSION['carrinho'][$id] = $quantity; 
	}
}

function deleteCart($id) {
	if(isset($_SESSION['carrinho'][$id])){ 
		unset($_SESSION['carrinho'][$id]); 
	} 
}

function updateCart($id, $quantity) {
	if(isset($_SESSION['carrinho'][$id])){ 
		if($quantity > 0) {
			$_SESSION['carrinho'][$id] = $quantity;
		} else {
		 	deleteCart($id);
		}
	}
}

function getContentCart($pdo) {
	
	$results = array();
	
	if($_SESSION['carrinho']) {
		
		$cart = $_SESSION['carrinho'];
		$pizzas =  getPizzasById($pdo, implode(',', array_keys($cart)));

		foreach($pizzas as $pizza) {

			$results[] = array(
							  'id' => $pizza['id'],
							  'name' => $pizza['sabor'],
							  'price' => $pizza['preco'],
							  'quantity' => $cart[$pizza['id']],
							  'subtotal' => $cart[$pizza['id']] * $pizza['preco'],
						);
		}
	}
	
	return $results;
}

function getTotalCart($pdo) {
	
	$total = 0;

	foreach(getContentCart($pdo) as $pizza) {
		$total += $pizza['subtotal'];
	} 
	return $total;
}