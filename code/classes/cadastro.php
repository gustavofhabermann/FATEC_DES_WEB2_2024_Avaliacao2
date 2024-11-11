<?php

class Cadastro{
    private $host = 'localhost';
    private $dbname = 'vagas';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function __construct() {
        try{
            $this->pdo = new PDO("mysql:{$this->host};dbname={$this->dbname}",$this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }

    }


    public function __destruct(){
        $this->pdo = null;
    }

    public function Cadastrar_Vagas($nome_empresa, $numero_whatsapp, $email_contato, $descritivo_vaga, $curso){
        try{
            $stmt = $this->pdo->prepare("INSERT INTO vagas (nome_empresa, numero_whatsapp, email_contato, descritivo_vaga, curso values (?,?,?,?,?)");
            $stmt->execute([$nome_empresa, $numero_whatsapp, $email_contato, $descritivo_vaga, $curso]);
            return true;
        } catch(PDOException $e){
            echo "Erro ao cadastrar vaga: " . $e->getMessage();
            return false;
        }

    }

    public function Remover_Vagas($id){
        try{
            $stmt = $this->pdo->prepare("DELETE FROM vagas WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->rowCount() > 0;
        }catch(PDOException $e){
            echo "Erro ao remover a vaga: " . $e->getMessage();
            return false;
        }

    }

    public function Listar_Vagas(){
        try{
            $stmt = $this->pdo->query("SELECT * FROM vagas");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            echo "Erro ao listar vags: " .$e->getMessage();
            return[];
        }
    }

}


?>