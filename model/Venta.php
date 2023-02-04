<?php

class Venta {
    
    private $idProducto;
    private $cantidad;
    private $createdAt;
    private $conexionDB;

    public function __construct($idProducto, $cantidad) {
        $this->conexionDB = new Connect();
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;
        $this->createdAt = date('y-m-d');
    }

    public function __destruct() {
        $this->conexionDB = NULL;
    }

    public function CreateVenta() {
        try {
            $sql = "INSERT INTO VENTA(cantidad,createdAt,id_producto) VALUES(?, ?, ?)";
            $stmt = $this->conexionDB->onConnect()->prepare($sql);
            $stmt->bindParam(1, $this->cantidad);
            $stmt->bindParam(2, $this->createdAt);
            $stmt->bindParam(3, $this->idProducto);
            $stmt->execute();
            return $stmt;
        } catch (Exception $ex) {
            die("Se produjo un error $ex");
        }
    }
}
