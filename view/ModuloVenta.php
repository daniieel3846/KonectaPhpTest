<?php
include '../controller/VentaController.php';
include '../controller/ProductoController.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modulo de Venta</title>
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
                ?>
                <?php
                $productoController = new ProductoController();
                $data = $productoController->getAll();
                ?>
                <form action="../controller/VentaController.php" method="POST">
                    <div class="card col-md-6 offset-md-3">
                        <div class="card-header">
                            <h3>Modulo Venta</h3>
                        </div>
                        <input readonly="true" hidden="true" name="id" value="<?php echo $id ?>">
                        <div class="card-body">                               
                            <div class="form-group mb-2">                        
                                <select required="true" name="id" class="form-select" aria-label="Default select example">
                                    <option selected>Seleccione el producto</option>
                                    <?php foreach ($data as $key => $value) { ?>
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['id'] ?>. <?php echo $value['nombre'] ?></option>                      
                                    <?php } ?>
                                </select>                             
                            </div>
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input id="cantidad" name="cantidad" type="number" placeholder="Ingrese una cantidad" class="form-control mb-2" required="true"/>
                            </div>
                        </div>
                        <div class="card-footer">
                            <?php if ($data != NULL) { ?>
                                <input type="submit" name="Vender" value="Vender" class="btn btn-success">                      
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
