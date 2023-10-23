<?php include 'codeProveedor.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Proveedor</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                            <input type="hidden" require name="Id_prov" id="Id_prov" placeholder="" value="<?php echo $Id_prov ?>">



                                <div class="form-group col-md-12">

                                    <label for="Tipo_doc_prov" >Tipo de documento</label>

                                    <select name="Tipo_doc_prov" id="Tipo_doc_prov" class="form-control">
                                        <option value="CC">Seleccione el Tipo de Documento</option>
                                        <option value="CC">Cedula de Ciudadania</option>
                                        <option value="TI">Tarjeta de Identidad</option>
                                        <option value="Ce">Cedula de Extranjería</option>
                                    </select>
                                   

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Doc_prov ">Documento</label>
                                    <input type="text" class="form-control" require name="Doc_prov " id="Doc_prov " placeholder="" value="<?php echo $Doc_prov  ?>">
                                    <br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Nom_prov">Nombre(s)</label>
                                    <input type="text" class="form-control" require name="Nom_prov" id="Nom_prov" placeholder="" value="<?php echo $Nom_prov ?>">

                                </div>

                                
                                <div class="form-group col-md-12">
                                    <label for="Ape_prov">Apellido(s)</label>
                                    <input type="text" class="form-control" require name="Ape_prov" id="Ape_prov" placeholder="" value="<?php echo $Ape_prov ?>">

                                </div>

                                         
                                <div class="form-group col-md-12">
                                    <label for="Tel_prov">Teléfono</label>
                                    <input type="text" class="form-control" require name="Tel_prov" id="Tel_prov" placeholder="" value="<?php echo $Tel_prov ?>">

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
                Agregar Proveedor
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Tipo documento</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Teléfono</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaEmpleados tiene algun contenido */
                    if ($listaProveedor->num_rows > 0) {

                        foreach ($listaProveedor as $proveedor) {


                    ?>

                            <tr>

                              
                                <td> <?php echo $proveedor['Id_prov']        ?> </td>
                                <td> <?php echo $proveedor['Tipo_doc_prov']    ?> </td>
                                <td> <?php echo $proveedor['Doc_prov']        ?> </td>
                                <td> <?php echo $proveedor['Nom_prov'] ?> </td>
                                <td> <?php echo $proveedor['Ape_prov'] ?> </td>
                                <td> <?php echo $proveedor['Tel_prov']    ?> </td>



                                <form action="" method="post">
                                    <input type="hidden" name="Id_prov" value="<?php echo $proveedor['Id_prov'];  ?>">
                                    <input type="hidden" name="Tipo_doc_prov" value="<?php echo $proveedor['Tipo_doc_prov'];  ?>">
                                    <input type="hidden" name="Doc_prov" value="<?php echo $proveedor['Doc_prov'];  ?>">
                                    <input type="hidden" name="Nom_prov" value="<?php echo $proveedor['Nom_prov'];  ?>">
                                    <input type="hidden" name="Ape_prov" value="<?php echo $proveedor['Ape_prov'];  ?>">
                                    <input type="hidden" name="Tel_prov" value="<?php echo $proveedor['Tel_prov'];  ?>">
                                    
                    

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