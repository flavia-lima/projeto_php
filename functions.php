<?php

use \Flavia\Model\User;

// Formata o valor do preço para a versão brasileira. 
// Casas decimais com separação por vírgula.
// Casa dos milhares com separação por ponto.
function formatPrice($price)
{

	if (!$price > 0) $price = 0;

	return number_format($price, 2, ",", ".");

}

//Para utilizar a função no template Login do site.
function checkLogin($inadmin = true)
{

	return User::checkLogin($inadmin);

}

//Pega o nome do usuário.
function getUserName()
{

	$user = User::getFromSession();

	return $user->getdes_person();

}

?>