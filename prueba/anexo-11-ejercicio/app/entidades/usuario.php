<?php
namespace Entidades;


class Usuario {
	public $mail;
	public $id;
	public $pass;

	
	public function __construct( $_id, $_mail, $_pass ) {
		$this->id = $_id;
		$this->mail = $_mail;
		$this->pass = $_pass;
	}
}