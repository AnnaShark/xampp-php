<?php
namespace Entidades;


class Tarea {
	public $id;
	public $id_usuario;
	public $titulo;
	public $fecha;
	public $importancia;
	public $descripcion;

	
	public function __construct( $_id, $_id_usuario, $_titulo, $_fecha, $_importancia, $_descripcion) {
		$this->id = $_id;
		$this->id_usuario = $_id_usuario;
		$this->titulo = $_titulo;
		$this->fecha = $_fecha;
		$this->importancia = $_importancia;
		$this->descripcion = $_idescripcion;
	}
}