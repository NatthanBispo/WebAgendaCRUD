<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once("../Model/Contato.php");
class ContatoFactory {
  private $instancia;
  private $pdo;

    private function __construct(){
      try {
        $this->pdo = new PDO('sqlite:../Model/DBContato.sqlite3');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          echo $e->getMessage();
      } catch (Exception $e) {
          echo $e->getMessage();
      }
    }

    public function add($nome, $email) {
      if($nome != null && $email != null)
        return $this->SalvarBanco($nome, $email);
        return false;
    }

    public function SalvarBanco($nome, $email) {
      try {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS contatos (
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        email TEXT,
                        nome TEXT)");

        if($this->findEmail($email))
          throw new Exception("Email ja cadastrado!");
        
        $sql = 'INSERT INTO contatos (email, nome) VALUES (?, ?)';
        $this->pdo->prepare($sql)->execute([$email, $nome]);
        $verifica = "Contato cadastrado com sucesso";
      } catch (PDOException $e) {
          echo $e->getMessage();
          $verifica = false;
      } catch (Exception $e) {
          $verifica = $e->getMessage();
      }
        return $verifica;
    }

    public function getLista(){
      $get = array();
      try{
        $auxLista = $this->pdo->query('SELECT * FROM contatos');
        $i=0;
        foreach($auxLista as $row) {
          $get[$i++] = (new Contato($row['id'], $row['nome'], $row['email']));
        }
      } catch (PDOException $e) {
        return false;
      } catch (Exception $e) {
        return false;
      }
      return $get;
    }

    public function getContato($id){
      try{
        $sql = "SELECT * FROM contatos WHERE id=?";
        if(!empty($sql)){
          $auxLista = $this->pdo->prepare($sql);
          $auxLista->execute([$id]);
          foreach($auxLista as $row){
            return new Contato($row['id'], $row['nome'], $row['email']);
          }
        }
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function updateContato($id, $newName, $newEmail){
      try{
        $sqlInsert = "SELECT * FROM contatos WHERE email=?";
        $result = $this->pdo->prepare($sqlInsert);
        $result->execute([$newEmail]);

        foreach($result as $row){
          if($id != $row['id'])
            throw new Exception("Email ja cadastrado!");
        }

        $sql = 'UPDATE contatos SET email = ?, nome = ? WHERE id = ?';
        $this->pdo->prepare($sql)->execute([$newEmail, $newName, $id]);
      } catch (PDOException $e){
        echo $e->getMessage();
      } catch (Exception $e) {
        return $e->getMessage();
      }
      return "Contato atualizado com sucesso";
    }

    public function removeContato($id){
      try{
        $sql = "DELETE FROM contatos WHERE id=?";
        $this->pdo->prepare($sql)->execute([$id]);
      } catch (PDOException $e){
        echo $e->getMessage();
        return "Contato nao encontrado";
      }
      return "Contato removido com sucesso";
    }

    private function findEmail($email){
      try{
        $sql = "SELECT COUNT(email) as count FROM contatos WHERE email = ?";
        $result = $this->pdo->prepare($sql);
        $result->execute([$email]);
        
        foreach($result as $row){
          $result = $row['count'];
        }

        return ($result > 0) ? true : false;
        
      } catch (PDOException $e){
        echo $e->getMessage();
      }
    }

    public function limparLista(){
      try{
        $this->pdo->exec('DELETE FROM contatos');
        $this->pdo->exec("DELETE FROM sqlite_sequence WHERE name='contatos'");
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

    public static function getContatoFactory(): ContatoFactory{
      if(!isset($instancia)){
        $instancia = new ContatoFactory();
      }
      return $instancia;
    }
}
