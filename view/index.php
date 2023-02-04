<?php
include '../controller/ProductoController.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cafe Konecta</title>
        <link rel="stylesheet" href="../assets/css/style.css" >
        <link rel="icon" type="image/x-icon" href="../assets/images/icon.jpg" />
        <!-- Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-dark bg-dark">
                <div>
                    <a class="navbar-brand" href="#">Cafeteria Konecta</a>
                </div>
            </nav>
        </header>
        <div class="container">
            <?php
            $productoController = new ProductoController();
            $data = $productoController->getAll();
            ?>
            <h2 class='text-center'>Lista de Productos</h2>
            <a href="ModuloProducto.php?id=0" class='btn btn-primary mb-1'>Almacenar</a>
            <a href="ModuloVenta.php?id=0" class='btn btn-success mb-1'>Nueva Venta</a>
            <div class='row'>
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>REFERENCIA</th>
                            <th>PRECIO</th>
                            <th>PESO</th>
                            <th>CATEGORIA</th>
                            <th>STOCK</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value['nombre']; ?></td>
                                <td><?php echo $value['referencia']; ?></td>
                                <td>$<?php echo $value['precio']; ?></td>
                                <td><?php echo $value['peso']; ?> kg</td>
                                <td><?php echo $value['categoria']; ?></td>
                                <td><?php echo $value['stock']; ?></td>
                                <td>
                                    <a href="../controller/ProductoController.php?updateId=<?php echo $value['id'] ?>" class="btn btn-warning">Gestionar</a>
                                    <a onclick="return confirmar()" href="../controller/ProductoController.php?deleteId=<?php echo $value['id'] ?>" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>            
                    </tbody>
                </table>

            </div>
        </div>
        <footer class="footer">
            <span>All Rights Reserved 2023 @Konecta</span>
        </footer>
        <script src="../assets/js/function.js"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
