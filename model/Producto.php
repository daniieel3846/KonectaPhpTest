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

    
    
    public function findAll() {
        $sql = "SELECT * FROM PRODUCTO";
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
