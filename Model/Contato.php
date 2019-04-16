<?php
	class Contato {
		Private $id;
		Private $nome;
		Private $email;

		public function __construct(int $id, String $nome, String $email) {
			$this->id = $id;
			$this->nome = $nome;
			$this->email = $email;
		}

		public function getId(): int{
			return $this->id;
		}

		public function getNome(): String{
			return $this->nome;
		}

		public function getEmail(): String{
			return $this->email;
		}
	}
