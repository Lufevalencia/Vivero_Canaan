<?php include 'codeCliente.php'; ?>

<?php include("../paginas/head.php") ?>

<div class="container">
    <div class="row">



        <!-- enctype="multipart/form-data" se utiliza para tratar la fotografia -->
        <form action="" method="post" >



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- cabecera del modal -->
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Cliente</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                            



                                <div class="form-group col-md-12">

                                    <label for="Tipo_doc_cli" >Tipo de documento</label>

                                    <select name="Tipo_doc_cli" id="Tipo_doc_cli" class="form-control">
                                        <option value="CC">Seleccione el Tipo de Documento</option>
                                        <option value="CC">Cedula de Ciudadania</option>
                                        <option value="TI">Tarjeta de Identidad</option>
                                        <option value="Ce">Cedula de Extranjería</option>
                                    </select>
                                   

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Id_cli">Documento</label>
                                    <input type="text" class="form-control" require name="Id_cli" id="Id_cli" placeholder="" value="<?php echo $Id_cli  ?>">
                                    <br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Nom_cli">Nombre(s)</label>
                                    <input type="text" class="form-control" require name="Nom_cli" id="Nom_cli" placeholder="" value="<?php echo $Nom_cli ?>">

                                </div>

                                
                                <div class="form-group col-md-12">
                                    <label for="Ape_cli">Apellido(s)</label>
                                    <input type="text" class="form-control" require name="Ape_cli" id="Ape_cli" placeholder="" value="<?php echo $Ape_cli ?>">

                                </div>

                                
                                

                               
                                <div class="form-group col-md-12">
                                    <label for="Direc_cli">Dirección</label>
                                    <input type="text" class="form-control" require name="Direc_cli" id="Direc_cli" placeholder="" value="<?php echo $Direc_cli ?>">

                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label for="Tel_cli">Teléfono</label>
                                    <input type="text" class="form-control" require name="Tel_cli" id="Tel_cli" placeholder="" value="<?php echo $Tel_cli ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Correo_cli">Correo electrónico</label>
                                    <input type="email" class="form-control" require name="Correo_cli" id="Correo_cli" placeholder="" value="<?php echo $Correo_cli ?>">

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
                Agregar Cliente
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                      
                        <th scope="col">Tipo documento</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo electrónico</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaEmpleados tiene algun contenido */
                    if ($listaCliente->num_rows > 0) {

                        foreach ($listaCliente as $cliente) {


                    ?>

                            <tr>

                              
                                <td> <?php echo $cliente['Tipo_doc_cli']    ?> </td>
                                <td> <?php echo $cliente['Id_cli']        ?> </td>
                                <td> <?php echo $cliente['Nom_cli'] ?> </td>
                                <td> <?php echo $cliente['Ape_cli'] ?> </td>
                                <td> <?php echo $cliente['Direc_cli']    ?> </td>
                                <td> <?php echo $cliente['Tel_cli']    ?> </td>
                                <td> <?php echo $cliente['Correo_cli']    ?> </td>



                                <form action="" method="post">
                                  
                                    <input type="hidden" name="Tipo_doc_cli" value="<?php echo $cliente['Tipo_doc_cli'];  ?>">
                                    <input type="hidden" name="Id_cli" value="<?php echo $cliente['Id_cli'];  ?>">
                                    <input type="hidden" name="Nom_cli" value="<?php echo $cliente['Nom_cli'];  ?>">
                                    <input type="hidden" name="Ape_cli" value="<?php echo $cliente['Ape_cli'];  ?>">
                                    <input type="hidden" name="Direc_cli" value="<?php echo $cliente['Direc_cli'];  ?>">
                                    <input type="hidden" name="Tel_cli" value="<?php echo $cliente['Tel_cli'];  ?>">
                                    <input type="hidden" name="Correo_cli" value="<?php echo $cliente['Correo_cli'];  ?>">
                    

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