<?php

namespace Flavia;

class PageAdmin extends Page {

	public function __construct($opts = array(), $tpl_dir = "/views/admin/")
	{
		//Construct da classe pai.
		parent::__construct($opts, $tpl_dir);

	}

}

?>