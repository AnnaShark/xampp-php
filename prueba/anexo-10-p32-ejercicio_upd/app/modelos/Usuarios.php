<?php
namespace App\Modelos;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Entidades\Usuario;
use \App\Interfaces\Crud;

class Usuarios implements Crud {

public static function getAll() {
	$usuarios = array();
	try {
		$db = Database::instance();
		$sql = "SELECT * from usuarios";
		$query = $db->run($sql);
		// Bucle de obtención de resultados
		while ( $reg = $query->fetch() ) {
			// Creacion de objeto Usuario por cada registro y agregado
			// a matriz de resultados
			array_push($usuarios,
				new Usuario(
					$reg['USUARIO'],
					$reg['CLAVE'],
					$reg['ADMINISTRADOR'],
					$reg['ACTIVO']
				)
			);
		}/* DEBUG */echo"<br>USUARIOS:";var_dump($usuarios);
		return $usuarios;
	} catch(\PDOException $e) {
		print "Error!: " . $e->getMessage();
	}
}

public static function getById($id) {
	echo("passo per  GetByID");
	try {
		$db = Database::instance();
		$sql = "SELECT * from usuarios WHERE usuario LIKE :usuario";
		$query = $db->run($sql, [':usuario' => $id]);
		$reg = $query->fetch();
		return ( ($reg)?
		// Retorno del objeto Usuario recuperado
		new Usuario($reg['USUARIO'],
			$reg['CLAVE'],
			$reg['ADMINISTRADOR'],
			$reg['ACTIVO'])
		// Retorno NULL si no se recuperó ningún registro
		:NULL );
	} catch(\PDOException $e) {
		print "Error!: " . $e->getMessage();
	}
}

public static function insert($user) {
	try {
		$db = Database::instance();
		$sql = "INSERT INTO USUARIOS( USUARIO, CLAVE, ADMINISTRADOR, ACTIVO )
				VALUES ( :usuario, :clave, :admin, :activo )";
		$query = $db->run($sql, [':usuario' => $user->nombre,
			':clave' => $user->clave,
			':admin' => $user->administrador,
			':activo' => $user->activo ]);
	} catch(\PDOException $e) {
		print "Error!: " . $e->getMessage();
	}
}

public static function update($user) {
	try {
		$db = Database::instance();
		$sql = "UPDATE usuarios SET clave = :clave,
		administrador = :admin,
		activo = :activo
		WHERE usuario = :usuario";
		$query = $db->run($sql, [':usuario' => $user->nombre,
			':clave' => $user->clave,
			':admin' => $user->administrador,
			':activo' => $user->activo ]);
	} catch(\PDOException $e) {
		print "Error!: " . $e->getMessage();
	}
}

public static function delete($id) {
	try {
		$db = Database::instance();
		$sql = "DELETE FROM usuarios WHERE usuario = :usuario";
		$query = $db->run($sql, [':usuario' => $id]);
	}
	catch(\PDOException $e)	{
		print "Error!: " . $e->getMessage();
	}
}
}