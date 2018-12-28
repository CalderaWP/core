<?php

/**
 * Contains the main instance of Caldera Core
 *
 * @return \calderawp\caldera\Core\CalderaCore
 */
function caldera(){
	static $caldera;
	if( ! $caldera ){
		$caldera = new \calderawp\caldera\Core\CalderaCore(
			new \calderawp\CalderaContainers\Service\Container()
		);
	}

	return $caldera;
}
