<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once("../Model/ContatoFactory.php");

if(empty($gerContato))
	$gerContato = new ContatoFactory();

if (isset($_GET['funcao']))
	$funcao = $_GET['funcao'];
else
	$funcao = "";

switch ($funcao) {
	case 'criarNovo':
		include('../View/novo.php');
		break;
	case 'adcionaNovo':
		if (isset($_POST['formNovo'])){
			$verifica = $gerContato->add($_POST['nome'], $_POST['email']);
			if(!$verifica)
				$verifica = "Contato nao adicionado";
		}else
      		$verifica = "As informacoes nao foram inseridas corretamente";

			include('../View/mostra.php');
		break;
	case 'verLista':
		$listaDeContatos = $gerContato->getLista();
			include('../View/lista.php');
		break;
	case 'editarContato':
		if (isset($_GET['id'])){
			$id = $_GET['id'];
			$contato = $gerContato->getContato($id);
			if(!$contato){
				$verifica = "Contato não encontrado";
				include('../View/mostra.php');
			}else{
				$nome = $contato->getNome();
				$email = $contato->getEmail();
				include('../View/editar.php');
			}
		}
		break;
	case 'updateContato':
		if(isset($_POST['formEditar'])){
			$verifica = $gerContato->updateContato($_GET['id'], $_POST['newName'], $_POST['newEmail']);
			include('../View/mostra.php');
		}
		break;
	case 'removerContato':
		if(isset($_GET['id'])){
			$verifica = $gerContato->removeContato($_GET['id']);
			include('../View/mostra.php');
		}
		break;
	case 'apagarLista':
		$gerContato->limparLista();
	default:
		header('Location:../index.php');
		break;
}
