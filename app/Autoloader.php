<?php

namespace App;

/**
*class autoloader pour charger les classe automatiquement
*@ package app 
*/
class Autoloader
{
	
	/*
	*
	*Enregistrer notre autoloader
	*
	*/
	static function register()
	{

		spl_autoload_register(array(__CLASS__,'autoload'));

	}

	/*
	*
	*Inclure le ficher correspondant a notre classe
	*
	*/
	static function autoload($class)
	{

		if(strpos($class, __NAMESPACE__ . '\\') === 0)
		{

			$class = str_replace(__NAMESPACE__.'\\','', $class);

			$class = str_replace('\\','/', $class);

			require __DIR__.'/'.$class.'.php';

		}
		
	}

}