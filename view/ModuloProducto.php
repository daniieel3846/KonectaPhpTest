<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../assets/css/style.css" >
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
                    <form action="../controller/ProductoController.php" method="POST" >
                        <div class="card col-md-6 offset-md-3">
                            <div class="card-header">
                                <h3>Modulo Producto</h3>
                            </div>
                            <div class="card-body">                               
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="referencia">Referencia</label>
                                    <input id="referencia" name="referencia" type="text" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input id="precio" name="precio" type="number" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="peso">Peso (KG)</label>
                                    <input id="peso" name="peso" type="number" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="categoria">Categoria</label>
                                    <input id="categoria" name="categoria" type="text" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input id="stock" name="stock" type="number" class="form-control"/>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="Guardar" value="Guardar" class="btn btn-success">                              
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
