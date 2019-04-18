<?php

		namespace Core;


		/**
		* la classe qui se chargera a charger notre tableau pour \
		*  
		*/

		

		class Config
		{

			//tableau pour enregistrer les infos sur notre base de donner
			private $settings = [];

			//variable static pour gere une instance de notre base
			private static $_instance;

			private $file = null;


			


			function __construct($file)
			{
				if (is_null($this->getFile())) {
				
					$this->settings = require $file; 

				}else{

					$this->settings = require $this->getFile();
				}
				
				
			}

			
			public static function  getInstance($file)
			{

				if(is_null(self::$_instance))
				{

					self::$_instance = new Config($file);

				}

				return self::$_instance;
			}



			public function get($key)
			{

				if (!isset($this->settings[$key])) {
					# code...
					return null;
				}

				return $this->settings[$key];

			}

			private function getFile()
			{
				
				return $this->file;

			}

			
		}