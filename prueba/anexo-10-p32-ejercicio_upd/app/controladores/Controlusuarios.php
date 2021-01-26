<?php
namespace App\Controladores;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \App\Modelos\Usuarios;
use \App\Entidades\Usuario;

class ControlUsuarios {

	/**
	* Solicitud de listado de todos los usuarios
	* URL: controladorusuarios/listar
	*/
	public function listar() {
		session_start();
		if (isset($_SESSION['usuario'])){
			
			$users = Usuarios::getAll();
			View::set("users", $users);
			View::render("lista");
		}else{
			header('Location: http://localhost/prueba/anexo-10-p32-ejercicio_upd/public/controlusuarios/login/');
		}

	}

	public function login() {
		View::render("login");
	}

	/**
	* Solicitud de visualización de formulario de edicion
	* del usuario con el nombre indicado.
	* URL: controladorusuarios/ver/<nombre>
	* @param unknown $nombre
	*/
	public function ver( $nombre ) {
		session_start();
		if (isset($_SESSION['usuario'])){
			$user = Usuarios::getById($nombre);
			View::set("user", $user);
			View::render("edicion");
		}else{header('Location: http://localhost/prueba/anexo-10-p32-ejercicio_upd/public/controlusuarios/login/');
		}	
	}

	/**
	* Solicitud de visualización de formulario de alta
	* de usuario.
	* URL: controladorusuarios/nuevo
	*/
	public function nuevo() {
		session_start();
		if (isset($_SESSION['usuario'])){
			View::set("error",[
			'mensaje'=> '',
			'nombre' => '',
			'clave' => '',
			'administrador' => 0,
			'activo' => 0 ]);
			View::render("nuevo");
		}else{header('Location: http://localhost/prueba/anexo-10-p32-ejercicio_upd/public/controlusuarios/login/');
		}
	}

	/**
	* Solicitud de actualización de usuario por los datos
	* enviados mediante POST, y muestra al usuario lista
	* actualizada de usuarios.
	* URL: controladorusuarios/actualizar
	*/
	public function actualizar() {
		$nombre = filter_input(INPUT_POST, "usuario");
		$clave = filter_input(INPUT_POST, "clave");
		$administrador = isset($_POST['administrador'])?1:0;
		$activo = isset($_POST['activo'])?1:0;
		$usuario = new Usuario($nombre, $clave, $administrador, $activo);
		Usuarios::update($usuario);
		$this->listar();
	}

	/**
	* Solicitud de eliminacion de usuario con el nombre
	* indicado mediante POST
	* URL: controladorusuarios/eliminar
	*/
	public function eliminar() {
		$nombre = filter_input(INPUT_POST, "usuario");
		Usuarios::delete($nombre);
		$this->listar();
	}

	/**
	* Solicitud de insercion de usuario con los datos
	* enviuados mediante POST, y se muestra lista actualizada
	* de usuarios.
	* En caso de usuario con nombre ya existente, se muestra
	* formulario con mensaje de error.
	* URL: controladorusuarios/insertar
	*/
	public function insertar() {
		$nombre = filter_input(INPUT_POST, "usuario");
		$clave = filter_input(INPUT_POST, "clave");
		$administrador = isset($_POST['administrador'])?1:0;
		$activo = isset($_POST['activo'])?1:0;
		
		// Comprobacion de usuario existente?
		$usuario_existente = Usuarios::getById($nombre);
		if ( $usuario_existente == NULL ) {
			// Usuario no existe
			$nuevo_usuario = new Usuario($nombre, $clave, $administrador, $activo);
			var_dump($nuevo_usuario);
			Usuarios::insert($nuevo_usuario);
			$this->listar();
		} else {
			// Usuario ya existe -> ERROR.
			View::set("error",[
			'mensaje'=> "Usuario $nombre ya existe",
			'nombre' => $nombre,
			'clave' => $clave,
			'administrador' => $administrador,
			'activo' => $activo ]);
			View::render("nuevo");
		}
	}

	public function autentificar() {
		$nombre = filter_input(INPUT_POST, "usuario");
		$clave = filter_input(INPUT_POST, "clave");
		$user = Usuarios::getById($nombre);
		$pass = $user->clave;
		if($pass==$clave){
			session_start();
			$_SESSION['usuario'] = $user;
			$this->listar();
		} else{
			$error = "Usuario desconocido";
			View::render("login");
		}
	}

	public function cerrarsesion() {
		session_destroy();
		header('Location: http://localhost/prueba/anexo-10-p32-ejercicio_upd/public/controlusuarios/login/');
	}	

	

}