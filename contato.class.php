<?php 

class Contato{
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:dbname=crudoo;host=localhost", "root", "");
    }

    public function adicionar($email, $nome = '') {
        // 1 Passo: Verificar se o email já existe no sistem
        // 2 Passo: adicionar
        if($this->existeEmail($email)){
            $sql = "INSERT INTO contatos SET nome = :nome, email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->execute();

            return True;
        }else{
            return false;
        }
    }

    public function getRegistro($id){
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $info = $sql->fetch();

            return $info;
        }else{
            return '';
        }
    }

    public function getAll(){
        $sql = "SELECT * FROM contatos";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            return  $sql->fetchAll();
        }else{
            return array();
        }
    }

    private function existeEmail($email){
        $sql = "SELECT id FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        $bool = $sql->rowCount();
        
        if($sql->rowCount() > 0) {
            return false;
        }else{
            return true;
        }
    }

    function ExcluirRegistro($id){
        $sql = "DELETE FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    function AtualizaRegistro($id, $nome, $email){
        $sql = "UPDATE contatos SET nome = :nome, email = :email WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return false;
        }else{
            return true;
        }
    }
}
