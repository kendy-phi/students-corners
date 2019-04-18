<?php
	
	use Core\Config;

	use Core\Database\Database;


		class App
		{

			//une variable pour stocker une instance de App
			public $title ="UPGA virtuelle";

			private static $_instance;

			public $_db;




			//function static pour generer une seule instance de notre classe 
			//durant tout le temps de notre connection
			public static function getInstance()
			{

				if(is_null(self::$_instance))
				{

					self::$_instance = new App();
				}

				return self::$_instance;

			}

			public static function load()
			{
				session_start();
				require ROOT.'/app/Autoloader.php';
				App\Autoloader::register();
				require ROOT.'/core/Autoloader.php';
				Core\Autoloader::register();

			}

			public function getDatabase()
			{

				$config = Config::getInstance(ROOT . '/config/Config.php');
				

				if(is_null($this->_db))
				{

					$this->_db = new Database($config->get('db_name'),$config->get('db_user'),$config->get('db_pass'),$config->get('db_host'));

				}

				return $this->_db;			

			}

			public function getTable($name)
			{
				
				$class_name = '\\App\\Table\\'.ucfirst($name).'Table'; 
				
				return new $class_name(self::getDatabase());
			}
			

		}
