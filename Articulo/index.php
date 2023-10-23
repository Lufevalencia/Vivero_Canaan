<?php include 'codeArticulo.php'; ?>

<?php include("../paginas/head.php") ?>

<div class="container">
    <div class="row">



        <!-- enctype="multipart/form-data" se utiliza para tratar la fotografia -->
        <form action="" method="post" enctype="multipart/form-data">



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- cabecera del modal -->
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Artículo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                             <input type="hidden" require name="Id_art" id="Id_art" placeholder="" value="<?php echo $Id_art ?>">



                                <div class="form-group col-md-12">
                                    <label for="Nom_art">Nombre</label>
                                    <input type="text" class="form-control" require name="Nom_art" id="Nom_art" placeholder="" value="<?php echo $Nom_art ?>">

                                </div>

                                
                                <div class="form-group col-md-12">
                                    <label for="Precio">Precio</label>
                                    <input type="text" class="form-control" require name="Precio" id="Precio" placeholder="" value="<?php echo $Precio ?>">

                                </div>

                               
                            



                            </div>
                        </div>

                        <!-- Pie/Footer del modal -->
                        <div class="modal-footer">

                            <button value="btnAgregar" class="btn btn-success" type="submit" name="accion">Agregar</button>
                            <button value="btnModificar" class="btn btn-warning" type="submit" name="accion">Modificar</button>
                            <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button>
                            <button value="btnCancelar" class="btn btn-primary" type="submit" name="accion">Cancelar</button>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background: linear-gradient(to right,  #527502, #527502);">
                Agregar Artículo
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nombre artículo</th>
                        <th scope="col">Precio</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaEmpleados tiene algun contenido */
                    if ($listaArticulo->num_rows > 0) {

                        foreach ($listaArticulo as $Articulo) {


                    ?>

                            <tr>

                            

                                <td> <?php echo $Articulo['Id_art']        ?> </td>
                                <td> <?php echo $Articulo['Nom_art']    ?> </td>
                                <td> <?php echo $Articulo['Precio'] ?> </td>



                                <form action="" method="post">

                                    <input type="hidden" name="Id_art" value="<?php echo $Articulo['Id_art'];  ?>">
                                    <input type="hidden" name="Nom_art" value="<?php echo $Articulo['Nom_art'];  ?>">
                                    <input type="hidden" name="Precio" value="<?php echo $Articulo['Precio'];  ?>">
                                    
                                    

                                    <td><input type="submit" class="btn btn-info" value="Seleccionar"></td>
                                    <td><button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button></td>

                                </form>


                            </tr>


                    <?php

                        }
                    } else {

                        echo "<h2> No tenemos resultados </h2>";
                    }

                    ?>


                </tbody>
            </table>

        </div>


    </div>
</div>

<?php include("../paginas/footer.php") ?>