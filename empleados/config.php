<?php

require_once("db.php");

class Config {
    private $id;
    private $nombre;
    private $celular;
    private $direccion;
    private $imagen;
    private $dbCnx;

    public function __construct($id = 0, $nombre = "", $celular = "", $direccion = "" , $imagen = "") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->direccion = $direccion;
        $this->imagen = $imagen;
        
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

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }
    public function getCelular() {
        return $this->celular;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function getDireccion() {
        return $this->direccion;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function insertData() {
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO categorias_empleados (nombre, celular, direccion, imagen) values(?, ?, ?, ?)");
            $stm->execute([$this->nombre, $this->celular, $this->direccion, $this->imagen]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectAll() {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM categorias_empleados");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete() {
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM categorias_empleados WHERE empleado_id = ?");
            $stm->execute([$this->id]);
            echo "<script>alert('Borrado Exitosamente');document.location='facturas.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOne() {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM categorias_empleados WHERE empleado_id = ?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update() {
        try {
            $stm = $this->dbCnx->prepare("UPDATE categorias_empleados SET nombre = ?, celular = ?, direccion = ?, imagen = ? WHERE empleado_id = ?");
            $stm->execute([$this->nombre, $this->celular, $this->direccion, $this->imagen, $this->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>
