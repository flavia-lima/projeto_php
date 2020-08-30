<?php

use \Flavia\Page;

//Rota da Página raiz.
$app->get('/', function() {
    
	$page = new Page();

	$page->setTpl("index");

});

?>