<?php

class Cadastro{
    private $host = 'localhost';
    private $dbname = 'vagas';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function __construct() {
        try{
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexão bem-sucedida!";
        } catch(PDOException $e){
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }

    }


    public function __destruct(){
        $this->pdo = null;
    }

    public function Cadastrar_Vagas($nome_empresa, $numero_whatsapp, $email_contato, $descritivo_vaga, $curso){
        try{
            $stmt = $this->pdo->prepare("INSERT INTO vagas (nome_empresa, numero_whatsapp, email_contato, descritivo_vaga, curso) values (:nome_empresa, :numero_whatsapp, :email_contato, :descritivo_vaga, :curso)");

            $stmt->bindParam(":nome_empresa", $nome_empresa, PDO::PARAM_STR);
            $stmt->bindParam(":numero_whatsapp", $numero_whatsapp, PDO::PARAM_STR);
            $stmt->bindParam(":email_contato", $email_contato, PDO::PARAM_STR);
            $stmt->bindParam(":descritivo_vaga", $descritivo_vaga, PDO::PARAM_STR);
            $stmt->bindParam(":curso", $curso, PDO::PARAM_STR);

            $stmt->execute();
            return true;
        } catch(PDOException $e){
            echo "Erro ao cadastrar vaga: " . $e->getMessage();
            return false;
        }

    }

    public function Remover_Vagas($id){
        try{
            $stmt = $this->pdo->prepare("DELETE FROM vagas WHERE id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_STR);
            $stmt->execute();
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
