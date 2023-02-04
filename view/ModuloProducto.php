<?php include '../controller/ProductoController.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modulo Productos</title>
        <link rel="stylesheet" href="../assets/css/style.css" >
        <link rel="icon" type="image/x-icon" href="../assets/images/icon.jpg" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-dark bg-dark">
                <div>
                    <a class="navbar-brand" href="index.php">Cafeteria Konecta</a>
                </div>
            </nav>
        </header>
        <div class="container mt-4">
            <div class="row">
                <?php
                $id = $_GET["id"];
                $nombre = "";
                $referencia = "";
                $precio = "";
                $peso = "";
                $categoria = "";
                $stock = "";
                if ($id != 0) {
                    $productoController = new ProductoController();
                    $data = $productoController->getProduct($id);
                    foreach ($data as $key => $value) {
                        $id = $value['id'];
                        $nombre = $value['nombre'];
                        $referencia = $value['referencia'];
                        $precio = $value['precio'];
                        $peso = $value['peso'];
                        $categoria = $value['categoria'];
                        $stock = $value['stock'];
                    }
                }
                ?>
                <form action="../controller/ProductoController.php" method="POST">
                    <div class="card col-md-6 offset-md-3">
                        <div class="card-header">
                            <h3>Modulo Producto</h3>
                        </div>
                        <input readonly="true" hidden="true" name="id" value="<?php echo $id ?>">
                        <div class="card-body">                               
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" name="nombre" type="text" value="<?php echo $nombre ?>" placeholder="Nombre del Producto" class="form-control mb-2" required="true"/>
                            </div>
                            <div class="form-group">
                                <label for="referencia">Referencia</label>
                                <input id="referencia" name="referencia" type="text" value="<?php echo $referencia ?>" placeholder="Referencia" class="form-control mb-2" required="true"/>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio ($)</label>
                                <input id="precio" name="precio" type="number" value="<?php echo $precio ?>" placeholder="0" class="form-control mb-2" required="true"/>
                            </div>
                            <div class="form-group">
                                <label for="peso">Peso (KG)</label>
                                <input id="peso" name="peso" type="number" value="<?php echo $peso ?>" placeholder="0.0" step="0.01" min="0" class="form-control mb-2" required="true"/>
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <input id="categoria" name="categoria" type="text" value="<?php echo $categoria ?>" placeholder="Categoria" class="form-control mb-2" required="true"/>
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input id="stock" name="stock" type="number" value="<?php echo $stock ?>" placeholder="Unidades disponibles" class="form-control" required="true"/>
                            </div>
                        </div>
                        <div class="card-footer">
                            <?php if ($id != 0) { ?>
                                <input type="submit" name="Modificar" value="Modificar" class="btn btn-info"> 
                            <?php } else { ?>
                                <input type="submit" name="Guardar" value="Guardar" class="btn btn-success">    
                            <?php } ?>
                            <a href="index.php" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer class="footer">
            <span>All Rights Reserved 2023 @Konecta</span>
        </footer>
        <script src="aassets/funciones.js"></script>
    </body>
</html>
