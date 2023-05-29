<?php

require_once("db.php");

class Config {
    private $id;
    private $celular;
    private $compañia;
    private $dbCnx;

    public function __construct($id = 0, $compañia = "", $celular = "") {
        $this->id = $id;
        $this->compañia = $compañia;
        $this->celular = $celular;
        $this->dbCnx = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setCompañia($compañia) {
        $this->compañia = $compañia;
    }

    public function getCompañia() {
        return $this->compañia;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function getCelular() {
        return $this->celular;
    }


    public function insertData() {
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO categorias_clientes (celular, compañia) values(?, ?)");
            $stm->execute([$this->celular, $this->compañia]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectAll() {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM categorias_clientes");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete() {
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM categorias_clientes WHERE clientes_id = ?");
            $stm->execute([$this->id]);
            echo "<script>alert('Borrado Exitosamente');document.location='facturas.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOne() {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM categorias_clientes WHERE clientes_id = ?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update() {
        try {
            $stm = $this->dbCnx->prepare("UPDATE categorias_clientes SET celular = ?, compañia = ? WHERE clientes_id = ?");
            $stm->execute([$this->celular, $this->compañia,  $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>
