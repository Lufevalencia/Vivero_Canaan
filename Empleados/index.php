<?php include 'codeEmpleados.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Empleado</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                                <!-- <label for="txtId">Id</label> -->
                                <input type="hidden" require name="txtId" id="txtId" placeholder="" value="<?php echo $txtId ?>">
                                <!-- <br> -->




                                <div class="form-group col-md-12">
                                    <label for="documento">Documento</label>
                                    <input type="text" class="form-control" require name="documento" id="documento" placeholder="" value="<?php echo $documento ?>">
                                    <br>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="txtNombre">Nombre(s)</label>
                                    <input type="text" class="form-control" require name="txtNombre" id="txtNombre" placeholder="" value="<?php echo $txtNombre ?>">
                                    <br>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="txtApellidoP">Apellido(s) </label>
                                    <input type="text" class="form-control" require name="txtApellidoP" id="txtApellidoP" placeholder="" value="<?php echo $txtApellidoP ?>">

                                </div>


                                
                                <div class="form-group col-md-12">

                                    <label for="Cargo">Cargo</label>

                                    <select name="Cargo" id="Cargo" class="form-control">
                                        <option value="#">Seleccione el Cargo</option>
                                        <option value="Operario de Campo">Operario de Campo</option>
                                        <option value="Jefe de Grupo">Jefe de Grupo</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Auxiliar Contable y Administrativo">Auxiliar Contable y Administrativo</option>
                                        <option value="Contador">Contador</option>
                                        <option value="Gerente Operativo">Gerente Operativo</option>
                                        <option value="Gerente Administrativo">Gerente Administrativo</option>
                                        
                                    </select>
                                   

                                </div>


                                <div class="form-group col-md-12">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" require name="direccion" id="direccion" placeholder="" value="<?php echo $direccion ?>">

                                </div>

                                
                                <div class="form-group col-md-12">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" class="form-control" require name="telefono" id="telefono" placeholder="" value="<?php echo $telefono ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="txtCorreo">Correo electrónico</label>
                                    <input type="email" class="form-control" require name="txtCorreo" id="txtCorreo" placeholder="" value="<?php echo $txtCorreo ?>">
                                    <br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="foto">Foto</label>
                                    <!-- El atributo accept image .... solo acepta formatos de imagen -->
                                    <input type="file" class="form-control" require accept="image/*" name="foto" id="foto" placeholder="" value="<?php echo $foto ?>">
                                    <br>
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
                Agregar Empleado
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Código</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Cargo</th>
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
                    if ($listaEmpleados->num_rows > 0) {

                        foreach ($listaEmpleados as $empleado) {


                    ?>

                            <tr>

                                <td>
                                    <img class="img-thumbnail" width="100px" src="../Imagenes/Empleados/<?php echo $empleado['foto']; ?>" />

                                </td>

                                <td> <?php echo $empleado['id']        ?> </td>
                                <td> <?php echo $empleado['documento']        ?> </td>
                                <td> <?php echo $empleado['nombre']    ?> </td>
                                <td> <?php echo $empleado['apellidoP'] ?> </td>
                                <td> <?php echo $empleado['Cargo'] ?> </td>
                                <td> <?php echo $empleado['direccion'] ?> </td>
                                <td> <?php echo $empleado['telefono']        ?> </td>
                                <td> <?php echo $empleado['correo']    ?> </td>



                                <form action="" method="post">

                                    <input type="hidden" name="txtId" value="<?php echo $empleado['id'];  ?>">
                                    <input type="hidden" name="documento" value="<?php echo $empleado['documento'];  ?>">
                                    <input type="hidden" name="txtNombre" value="<?php echo $empleado['nombre'];  ?>">
                                    <input type="hidden" name="txtApellidoP" value="<?php echo $empleado['apellidoP'];  ?>">
                                    <input type="hidden" name="Cargo" value="<?php echo $empleado['Cargo'];  ?>">
                                    <input type="hidden" name="direccion" value="<?php echo $empleado['direccion'];  ?>">
                                    <input type="hidden" name="telefono" value="<?php echo $empleado['telefono'];  ?>">
                                    <input type="hidden" name="txtCorreo" value="<?php echo $empleado['correo'];  ?>">
                                    <input type="hidden" name="foto" value="<?php echo $empleado['foto'];  ?>">

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