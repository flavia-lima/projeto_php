<?php

// Formata o valor do preço para a versão brasileira. 
// Casas decimais com separação por vírgula.
// Casa dos milhares com separação por ponto.
function formatPrice(float $price)
{

	return number_format($price, 2, ",", ".");

}

?>