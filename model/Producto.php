<?php

require_once '../db/Connect.php';

class Producto {

    private $id;
    private $nombre;
    private $referencia;
    private $precio;
    private $peso;
    private $categoria;
    private $stock;
    private $createdAt;
    private $conexionDB;

    public function __construct($nombre, $referencia, $precio, $peso, $categoria, $stock) {
        $this->conexionDB = new Connect();
        $this->nombre = $nombre;
        $this->referencia = $referencia;
        $this->precio = $precio;
        $this->peso = $peso;
        $this->categoria = $categoria;
        $this->stock = $stock;
    }

    public function __destruct() {
        $this->conexionDB = NULL;
    }

    public function CreateProducto() {
        try {
            $current_date = date('y-m-d');
            $sql = "INSERT INTO PRODUCTO(nombre,referencia,precio,peso,categoria,stock,createAt) VALUES(?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conexionDB->onConnect()->prepare($sql);
            $stmt->bindParam(1, $this->nombre);
            $stmt->bindParam(2, $this->referencia);
            $stmt->bindParam(3, $this->precio);
            $stmt->bindParam(4, $this->peso);
            $stmt->bindParam(5, $this->categoria);
            $stmt->bindParam(6, $this->stock);
            $stmt->bindParam(7, $current_date);
            $stmt->execute();
            return $stmt;
        } catch (Exception $ex) {
            die("Se produjo un error $ex");
        }
    }

    public function UpdateProducto($id) {
        try {
            $current_date = date('y-m-d');
            $sql = "UPDATE PRODUCTO SET nombre = ?, referencia = ?, precio = ?, peso = ?, categoria = ?, stock = ?, updateAt = ? WHERE id = $id";
            $query = $this->conexionDB->onConnect()->prepare($sql);
            $query->execute(array(
                $this->nombre,
                $this->referencia,
                $this->precio,
                $this->peso,
                $this->categoria,
                $this->stock,
                $current_date
            ));
            return $query;
        } catch (Exception $e) {
            die("Se produjo un error $e");
        }
    }

    public function UpdateProductoStock($id) {
        try {
            $current_date = date('y-m-d');
            $sql = "UPDATE PRODUCTO SET stock = ?, updateAt = ? WHERE id = $id";
            $query = $this->conexionDB->onConnect()->prepare($sql);
            $query->execute(array(
                $this->stock,
                $current_date
            ));
            return $query;
        } catch (Exception $e) {
            die("Se produjo un error $e");
        }
    }

    public function findAll() {
        $sql = "SELECT * FROM PRODUCTO";
        $query = $this->conexionDB->onConnect()->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findProductoById($id) {
        $sql = "SELECT * FROM PRODUCTO WHERE id = $id ";
        $query = $this->conexionDB->onConnect()->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DeleteProducto($id) {
        $sql = "DELETE FROM PRODUCTO WHERE id = $id";
        $query = $this->conexionDB->onConnect()->prepare($sql);
        $query->execute();
        return $query;
    }

}
