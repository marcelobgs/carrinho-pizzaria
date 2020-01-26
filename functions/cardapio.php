<?php 

function getPizzas($pdo){
	$sql = "SELECT *  FROM pizzas ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPizzasById($pdo, $ids) {
	$sql = "SELECT * FROM pizzas WHERE id IN (".$ids.")";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}