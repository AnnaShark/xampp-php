<?php
namespace Modelo;
defined("APPPATH") OR die("Access denied");
use \Core\App;

class Database {
	private $_dbUser;
	private $_dbPassword;
	private $_dbHost;
	protected $_dbName;

	private $_connection;
	private static $_instance;
	/**
	* [instance singleton]
	* @return [object] [class database]
	*/
	public static function instance() {
		if (!isset(self::$_instance)){
			$class = __CLASS__;
			self::$_instance = new $class;
		}
		return self::$_instance;
	}

	/**
	* [__construct]
	*/
	private function __construct() {
		try {
			//load from config/config.ini
			$config = parse_ini_file(APPPATH."/modelo/config.ini");
			
			//* DEBUG */var_dump($config);	

			$this->_dbHost = $config["host"];
			$this->_dbUser = $config["user"];
			$this->_dbPassword = $config["password"];
			$this->_dbName = $config["database"];
			$this->_connection = new \PDO('mysql:host='.$this->_dbHost.'; dbname='.$this->_dbName, $this->_dbUser, $this->_dbPassword);
			$this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			$this->_connection->exec("SET CHARACTER SET utf8");
		}catch (\PDOException $e){
			print "Error!: " . $e->getMessage();
			die();
		}
	}

	/**
	* [run]
	* @param [type] $sql [descripcion]
	* @param array $args parametros de sustitucion para consulta
	* @return PDOStatement
	*/
	public function run($sql, $args = []){
		$stmt = $this->_connection->prepare($sql);
		$stmt->execute($args);
		// Retorno de objeto PDOStatement.
		return $stmt;
	}

	/**
	*
	* @param unknown $method
	* @param unknown $args
	* @return mixed
	*/
	public function __call($method, $args) {
		// Ejecuta el método estático invocado con los argumentos dados
		// sobre el objeto PDO existente.
		return call_user_func_array(array($this->_connection, $method), $args);
	}
}