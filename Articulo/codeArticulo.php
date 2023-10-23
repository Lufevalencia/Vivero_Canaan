<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$Id_art = (isset($_POST['Id_art'])) ? $_POST['Id_art'] : "";
$Nom_art = (isset($_POST['Nom_art'])) ? $_POST['Nom_art'] : "";
$Precio = (isset($_POST['Precio'])) ? $_POST['Precio'] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':




                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insercionArticulo = $conn->prepare(
                    "INSERT INTO articulo ( Nom_art, 
                 Precio) 
                VALUES ('$Nom_art','$Precio')"
                );



                $insercionArticulo->execute();
                $conn->close();
               
               echo" <script>
                    swal('Mensaje Principal!', 'Mensaje segundario!', 'success');
                    </script>";
                

                header('location: index.php');
        



        break;

    case 'btnModificar':

        $editarArticulo = $conn->prepare(" UPDATE articulo SET
        Nom_art = '$Nom_art', Precio = '$Precio',
        WHERE Id_art = '$Id_art' ");

        
        $editarArticulo->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        /* 
        $consultaFoto = $conn->prepare(" SELECT foto FROM empleados
        WHERE id = '$txtId' "); */

        $eliminarArticulo = $conn->prepare(" DELETE FROM articulo
        WHERE Id_art = '$Id_art' ");

        // $consultaFoto->execute();
        $eliminarArticulo->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;

    default:
        # code...
        break;
}



/* Consultamos todos los empleados  */
$consultaArticulo = $conn->prepare("SELECT * FROM articulo");
$consultaArticulo->execute();
$listaArticulo= $consultaArticulo->get_result();
$conn->close();

 